<?php

use PHPUnit\Framework\TestCase;
use Application\Game\Models\TilesModel;

class TilesModelTest extends TestCase
{
    private TilesModel $sut;

    public function setUp(): void
    {
        $this->sut = new TilesModel();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(TilesModel::class, $this->sut);
    }

    public function testSetGetTiles(): void
    {
        $this->sut->setTiles([1 => 'normal', 2 => 'normal']);
        static::assertEquals([1 => 'normal', 2 => 'normal'], $this->sut->getTiles());
    }

    public function testGetNormalTiles(): void
    {
        $this->sut->setTiles([1 => 'normal', 2 => 'mystery']);

        static::assertEquals([1 => 'normal'], $this->sut->getNormalTiles());
    }

    public function testGetRandomNormalTileIndex(): void
    {
        $this->sut->setTiles([1 => 'normal', 2 => 'mystery']);

        static::assertEquals(1, $this->sut->getRandomNormalTileIndex());
    }
}
