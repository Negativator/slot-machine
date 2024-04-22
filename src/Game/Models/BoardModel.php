<?php

namespace Application\Game\Models;

class BoardModel
{
    private array $board;

    public function getBoard(): array
    {
        return $this->board;
    }

    public function setBoard(array $board): self
    {
        $this->board = $board;
        return $this;
    }

    private array $replacedMysteryTiles = [];

    public function getReplacedMysteryTiles(): array
    {
        return $this->replacedMysteryTiles;
    }

    public function setReplacedMysteryTiles(array $replacedMysteryTiles): self
    {
        $this->replacedMysteryTiles = $replacedMysteryTiles;
        return $this;
    }

    private ?array $finalBoard = null;

    public function getBoardWithReplacedTiles(): array
    {
        if (!$this->finalBoard) {
            $this->finalBoard = array_replace_recursive($this->board, $this->replacedMysteryTiles);
        }

        return $this->finalBoard;
    }
}
