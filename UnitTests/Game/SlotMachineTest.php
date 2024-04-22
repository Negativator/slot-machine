<?php

use Application\Game\SlotMachine;
use PHPUnit\Framework\TestCase;

class SlotMachineTest extends TestCase
{
    private SlotMachine $sut;

    public function setUp(): void
    {
        $this->sut = new SlotMachine();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(SlotMachine::class, $this->sut);
    }
}
