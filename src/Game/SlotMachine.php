<?php

namespace Application\Game;

use Application\Game\Calculation\BoardGenerator;
use Application\Game\Calculation\PayoutGenerator;
use Application\Game\Config\GameConfig;
use Application\Game\Models\WinPatternsModel;

class SlotMachine
{
    /**
     * @param float $stake
     * @return array
     * @throws \Exception
     */
    public function spin(float $stake): array
    {
        $config = new GameConfig();
        $reels = $config->getConfigKey('reels');
        $tiles = $config->getConfigKey('tiles');

        $board = (new BoardGenerator())->generate($reels, $tiles);

        $lines = $config->getConfigKey('lines');
        $payLines = new WinPatternsModel();
        $payLines->setPayLines($lines)->setBoardModel($board);

        $winLines = $payLines->getWinningLines();
        $payout = 0;
        if (!empty($winLines)) {
            $payout = (new PayoutGenerator())->generate($config->getConfigKey('pays'), $winLines, $stake);
        }

        // visualize board with replaced mystery
//        (new ConsoleTableGenerator())->generate($board->getBoardWithReplacedTiles());

        var_dump([
            'board' => $board->getBoard(),
            'replacedMysteries' => $board->getReplacedMysteryTiles(),
            'winLines' => $winLines,
            'payout' => number_format($payout, 2, '.', ''),
        ]);
        return [
            'board' => $board->getBoard(),
            'replacedMysteries' => $board->getReplacedMysteryTiles(),
            'winLines' => $winLines,
            'payout' => number_format($payout, 2, '.', ''),
        ];
    }
}
