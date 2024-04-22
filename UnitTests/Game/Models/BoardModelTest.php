<?php

use Application\Game\Models\BoardModel;
use PHPUnit\Framework\TestCase;

class BoardModelTest extends TestCase
{
    private BoardModel $sut;

    public function setUp(): void
    {
        $this->sut = new BoardModel();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(BoardModel::class, $this->sut);
    }

    public function testSetGetBoard(): void
    {
        $board = [[1, 1, 1, 1, 1], [2, 2, 2, 2, 2]];
        $this->sut->setBoard($board);
        static::assertEquals($board, $this->sut->getBoard());
    }

    public function testSetGetReplacedMysteryTiles(): void
    {
        $this->sut->setReplacedMysteryTiles([0 => [2 => 4]]);
        static::assertEquals([0 => [2 => 4]], $this->sut->getReplacedMysteryTiles());
    }

    public function testSetGetFinalBoard(): void
    {
        $this->sut->setBoard([[1, 2, 3, 4, 5]]);
        $this->sut->setReplacedMysteryTiles([0 => [2 => 4]]);

        static::assertEquals([[1, 2, 4, 4, 5]], $this->sut->getBoardWithReplacedTiles());
    }
}
