<?php

use Application\Game\Models\WinLineModel;
use PHPUnit\Framework\TestCase;

class WinLineModelTest extends TestCase
{
    private WinLineModel $sut;

    public function setUp(): void
    {
        $this->sut = new WinLineModel();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(WinLineModel::class, $this->sut);
    }

    public function testSetGetCoordinates(): void
    {
        $this->sut->setCoordinates([2, 1, 0]);
        static::assertEquals([2, 1, 0], $this->sut->getCoordinates());
    }

    public function testSetGetTileId(): void
    {
        $this->sut->setTileId(4);
        static::assertEquals(4, $this->sut->getTileId());
    }

    public function testGetCount(): void
    {
        $this->sut->setCoordinates([2, 1, 1, 1]);
        static::assertEquals(4, $this->sut->getCount());
    }

    public function testSetGetPattern(): void
    {
        $this->sut->setPattern([2 => [0, 0, 0, 0, 0]]);
        static::assertEquals([2 => [0, 0, 0, 0, 0]], $this->sut->getPattern());
    }

    public function testToArray(): void
    {
        $result = [
            'tileId' => 1,
            'coordinates' => [0, 0, 0],
            'total' => 3,
            'pattern' => [2 => [0, 0, 0, 0, 0]]
        ];

        $this->sut->setTileId($result['tileId']);
        $this->sut->setCoordinates($result['coordinates']);
        $this->sut->setPattern($result['pattern']);

        static::assertEquals($result, $this->sut->toArray());
    }
}
