<?php

use Application\Game\Calculation\BoardGenerator;
use PHPUnit\Framework\TestCase;

class BoardGeneratorTest extends TestCase
{
    private BoardGenerator $sut;

    public function setUp(): void
    {
        $this->sut = new BoardGenerator();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(BoardGenerator::class, $this->sut);
    }
}