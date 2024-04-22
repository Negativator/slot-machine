<?php

use Application\Game\Calculation\PayoutGenerator;
use PHPUnit\Framework\TestCase;

class PayoutGeneratorTest extends TestCase
{
    private PayoutGenerator $sut;

    public function setUp(): void
    {
        $this->sut = new PayoutGenerator();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(PayoutGenerator::class, $this->sut);
    }
}