<?php

namespace Application\Game\Calculation;

class PayoutGenerator
{
    public function generate(array $payTable, array $winLines, float $stake): float
    {
        $payTableMap = [];
        foreach ($payTable as $item) {
            $payTableMap[$item[0]][$item[1]] = $item[2];
        }

        $payout = 0;


        /** @var $winLine @see WinLineModel->toArray() */
        foreach ($winLines as $winLine) {
            $multiplier = $payTableMap[$winLine['tileId']][$winLine['total']];
            $payout += $stake * $multiplier;
        }

        return $payout;
    }
}