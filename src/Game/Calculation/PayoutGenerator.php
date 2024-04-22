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


        // convert floating point number to an int, safe check for money operation;
        $stake = $stake * 100;

        /** @var $winLine @see WinLineModel->toArray() */
        foreach ($winLines as $winLine) {
            $multiplier = $payTableMap[$winLine['tileId']][$winLine['total']];
            $payout += $stake * $multiplier;
        }

        // return float
        return $payout / 100;
    }
}