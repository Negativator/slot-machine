<?php

namespace Application\Game\Calculation;

use Application\Game\Models\BoardModel;
use Application\Game\Models\TilesModel;

class BoardGenerator
{
    public function generate(array $reels, array $tiles, int $rowCount): BoardModel
    {
        $board = [];

        $tiles = (new TilesModel())->setTiles(array_column($tiles, 'type', 'id'));
        $normalId = $tiles->getRandomNormalTileIndex();
        $replacedMystery = [];
        foreach ($reels as $col => $reel) { // iterates over the reels
            $reelLength = count($reel);
            $randomIndex = mt_rand(0, $reelLength - 1);

            for ($i = 0; $i < $rowCount; $i++) {
                // in case the selected random index is at the end of the reel next ones will start from beginning;
                $currentSymbol = $reel[$randomIndex % $reelLength];

                // replace mystery tiles with random normal one;
                if ($tiles->getTiles()[$currentSymbol] == 'mystery') {
                    $replacedMystery[$i][$col] = $normalId;
                }

                $board[$i][$col] = $currentSymbol;


                $randomIndex++;
            }
        }

        return (new BoardModel())->setBoard($board)->setReplacedMysteryTiles($replacedMystery);
    }
}