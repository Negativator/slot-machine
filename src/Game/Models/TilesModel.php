<?php

namespace Application\Game\Models;

class TilesModel
{
    /**
     * @var array $tiles['id' => 'type']
     *
     */
    private array $tiles;

    public function getTiles(): array
    {
        return $this->tiles;
    }

    public function setTiles(array $tiles): self
    {
        $this->tiles = $tiles;
        return $this;
    }

    public function getNormalTiles(): array
    {
        return array_filter($this->getTiles(), function ($val) {
           return $val == 'normal';
        });
    }

    public function getRandomNormalTileIndex(): int
    {
        return array_rand($this->getNormalTiles());
    }
}
