<?php

namespace Tests\Unit\Domain\TenantCheck;

use App\Domain\TenantCheck\PlaidTenantCheck;
use PHPUnit\Framework\TestCase;

class PlaidTenantCheckTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $check = new PlaidTenantCheck();

        $assets = json_decode(file_get_contents('tests/Unit/Domain/TenantCheck/fixtures/assets.json'));

        $check->ingest($assets);

        $superRegularIncome = collect([
            '2019-12' => -501.38,
            '2020-01' => -501.38,
            '2020-02' => -501.38,
            '2020-03' => -501.38,
            '2020-04' => -501.38,
            '2020-05' => -501.38,
        ]);
        $this->assertTrue($check->hasRegularIncome($superRegularIncome));

        $regularIncome = collect([
            '2019-12' => -501.38,
            '2020-01' => -502.38,
            '2020-02' => -508.38,
            '2020-03' => -503.38,
            '2020-04' => -509.38,
            '2020-05' => -510.38,
        ]);
        $this->assertTrue($check->hasRegularIncome($regularIncome));

        $peakMonths = collect([
            '2019-12' => -501.38,
            '2020-01' => -5002.38,
            '2020-02' => -508.38,
            '2020-03' => -5003.38,
            '2020-04' => -509.38,
            '2020-05' => -5100.38,
        ]);
        $this->assertTrue($check->hasRegularIncome($peakMonths));

        $irregularIncome = collect([
            '2019-12' => -501.38,
            '2020-01' => 0,
            '2020-02' => 0,
            '2020-03' => 0,
            '2020-04' => 0,
            '2020-05' => -501.38,
        ]);
        $this->assertFalse($check->hasRegularIncome($irregularIncome));


        $this->assertEquals(100, $check->generateScore());
    }
}
