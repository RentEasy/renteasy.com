<?php
declare(strict_types=1);

interface Application
{
    public function ssn(): string;
}

interface AcceptsApplications
{
    public function isApplicationValid(Application $application): bool;
}

interface Rule
{
    public function isSatisfiedBy(Application $application): bool;
}

final class SimpleApplication implements Application
{

    public function __construct(string $ssn)
    {
        $this->ssn = $ssn;
    }

    public function ssn(): string
    {
        return $this->ssn;
    }
}

final class RegularIncomeRequired implements Rule
{
    private IncomeVerificationService $incomeVerification;
    private int $amount;

    public function __construct(IncomeVerificationService $service, int $amount)
    {
        $this->incomeVerification = $service;
        $this->amount = $amount;
    }

    public function isSatisfiedBy(Application $application): bool
    {
        $income = $this->incomeVerification->averageMonthlyIncome(
            $application->ssn()
        );
        return $income >= $this->amount;
    }
}

final class Rental implements AcceptsApplications
{
    /**
     * @var array<Rule>
     */
    private $rules = [];

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function isApplicationValid(Application $application): bool
    {
        foreach ($this->rules as $rule) {
            if (!$rule->isSatisfiedBy($application)) {
                return false;
            }
        }
        return true;
    }
}
