<?php declare(strict_types = 1);

namespace App\Domain\TenantCheck;

use App\Domain\Enum;
use Illuminate\Support\Collection;

class PlaidTenantCheck
{

    private \stdClass $report;
    private Collection $mergedTransactions;

    public function __construct()
    {
        $this->mergedTransactions = collect();
    }

    public function ingest(\stdClass $assetReport)
    {
        $this->report = $assetReport->report;

        foreach($this->report->items as $item) {
            foreach($item->accounts as $account) {
                $this->mergedTransactions = $this->mergedTransactions->union($account->transactions);
            }
        }


//        $income = $this->mergedTransactions->filter(function($item) {
//            return $item->amount < 0;
//        });
//
//        $transByMonth = $income->mapToGroups(function($item) {
//            return [\DateTime::createFromFormat('Y-m-d', $item->date)->format('Y-m') => $item];
//        });
//
//        if($transByMonth->count() < $monthQualifier) {
//            // Check to ensure there's enough coverage in their accounts
//            return false;
//        }
//
//        // First check, income reliability
//        $monthlyIncome = $transByMonth->map(function($items) {
//            return collect($items)->pluck('amount')->sum();
//        });
    }

    public function hasRegularIncome(Collection $monthlyIncome) : RegularIncomeResultReason
    {
        /*
         * Basic premise:
         * 1. split the transactions into YYYY-MM groups
         * 2. find patterns of income
         * 3. Group into two numbers:
         *    a) avg income
         *    b) income reliability
         *
         * Questions:
         * 1. Do we even care about the unique income sources? Or just the average monthly amount?
         *    a) The logic would be essentially: sum up the amount, figure out avg over time, allow over but not under.
         */
        // How many months qualifies as "regular income"
        $monthQualifier = 6;
        // How much the regular amounts can differ
        // This may end up being a percent of their income
        $regularTolerancePercent = 0.20;

        if($monthlyIncome->count() < $monthQualifier) {
            // Check to ensure there's enough coverage in their accounts
            return RegularIncomeResultReason::RejectedNotEnoughHistory;
        }

        // First check, income reliability
        $avgMonthlyIncome = $monthlyIncome->avg();
        $irregularIncome = $monthlyIncome->filter(function($amount) use ($avgMonthlyIncome, $regularTolerancePercent) {
            // Amount can be more than avg, but not less
            $less = $avgMonthlyIncome > $amount;
            if($less) {
                // If it is less, make sure it's not $regularTolerancePercent less
                $percent = 1 - $avgMonthlyIncome / $amount;
                return $percent > $regularTolerancePercent;
            }

            return false;
        });
        if($irregularIncome->isEmpty()) {
            // First check worked, all income for the tenant is reliable.
            return true;
        }

        $totalRegularMonths = $monthlyIncome->count() - $irregularIncome->count();
        if($totalRegularMonths > $monthQualifier) {
            // Second check, you can have some irregular income if you have overall stable
            return true;
        }

        return false;
    }

    public function generateScore()
    {
        return 100;
    }

}

class RegularIncomeResult
{

    public bool $hasRegularIncome;
    public float $avgMonthlyIncome;

    public RegularIncomeResult $result;

}

abstract class RegularIncomeResultReason extends Enum {
    const Untested = 0;
    const Accepted = 1;
    const Rejected = 2;
    const RejectedNotEnoughHistory = 3;
}
