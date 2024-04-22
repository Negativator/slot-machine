<?php

namespace Application\Game\Models;

class WinPatternsModel
{
    private array $payLines;

    public function setPayLines(array $payLines): self
    {
        $this->payLines = $payLines;
        return $this;
    }

    public function getPayLines(): array
    {
        return $this->payLines;
    }

    private BoardModel $boardModel;

    public function setBoardModel(BoardModel $boardModel): void
    {
        $this->boardModel = $boardModel;
    }

    public function getBoardModel(): BoardModel
    {
        return $this->boardModel;
    }

    public function getWinningLines(): array
    {
        $winLines = [];
        $board = $this->getBoardModel()->getBoardWithReplacedTiles();
        foreach ($this->getPayLines() as $id => $payLine) {
            $lineCoordinates = [];
            $previousSymbol = null;
            foreach ($payLine as $col => $row) {
                $currentSymbol = $board[$row][$col];
                if ($currentSymbol !== $previousSymbol) {
                    if (count($lineCoordinates) >= 3) {
                        break;
                    }
                    $previousSymbol = $currentSymbol;
                    $lineCoordinates = [];
                }
                $lineCoordinates[$col] = $row;
            }
            if (count($lineCoordinates) >= 3) {
                $winLine = (new WinLineModel())
                    ->setCoordinates($lineCoordinates)
                    ->setTileId($previousSymbol)
                    ->setPattern($payLine);
                $winLines[$id] = $winLine->toArray();
            }
        }

        return $winLines;
    }
}