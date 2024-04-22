<?php

use Application\Game\Models\BoardModel;
use PHPUnit\Framework\TestCase;
use Application\Game\Models\WinPatternsModel;

class WinPatternsModelTest extends TestCase
{
    private WinPatternsModel $sut;

    public function setUp(): void
    {
        $this->sut = new WinPatternsModel();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(WinPatternsModel::class, $this->sut);
    }

    public function testSetGetPayLines(): void
    {
        static::assertInstanceOf(WinPatternsModel::class, $this->sut->setPayLines([1, 2, 2, 2, 1]));
        static::assertEquals([1, 2, 2, 2, 1], $this->sut->getPayLines());
    }

    public function testSetGetBoardModel(): void
    {
        $board = new BoardModel();
        $this->sut->setBoardModel($board);
        static::assertEquals($board, $this->sut->getBoardModel());
    }

    public function testGetWinningLines(): void
    {
        $boardMock = $this->createMock(BoardModel::class);

        $boardMock
            ->expects(static::once())
            ->method('getBoardWithReplacedTiles')
            ->willReturn([
                [3, 3, 3, 3, 3],
                [2, 2, 2, 2, 2],
                [1, 1, 3, 1, 1]
            ]);

        $payLines = [
            2 => [0, 0, 0, 0, 0],
            4 => [1, 1, 1, 1, 1],
            6 => [2, 2, 2, 2, 2],
        ];

        $this->sut->setBoardModel($boardMock);
        $this->sut->setPayLines($payLines);
        
        $result = $this->sut->getWinningLines();
        
        static::assertIsArray($result);
        static::assertCount(2, $result);
        static::assertArrayHasKey(2, $result);
        static::assertArrayHasKey(4, $result);

        $id = 2;
        foreach ($result as $item) {
            static::assertIsArray($item);
            static::assertEquals(5, $item['total']);
            static::assertEquals($payLines[$id], $item['pattern']);
            $id += 2;
        }
    }
}
