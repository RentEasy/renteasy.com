<?php

namespace Tests\Unit\Domain\TenantCheck;

use App\Domain\TenantCheck\TenantCheck;
use PHPUnit\Framework\TestCase;

class TenantCheckTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $check = new TenantCheck();

        $this->assertEquals(100, $check->generateScore());
    }
}
