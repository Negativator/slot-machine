<?php

namespace Application\Game\Models;

class WinLineModel
{
    private array $coordinates;

    public function getCoordinates(): array
    {
        return $this->coordinates;
    }

    /**
     * @param array $coordinates format ['col' => 'row']
     * @return $this
     */
    public function setCoordinates(array $coordinates): self
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    private int $tileId;

    public function getTileId(): int
    {
        return $this->tileId;
    }

    public function setTileId(int $tileId): self
    {
        $this->tileId = $tileId;
        return $this;
    }

    public function getCount(): int
    {
        return count($this->getCoordinates());
    }

    private array $pattern;

    public function getPattern(): array
    {
        return $this->pattern;
    }

    public function setPattern(array $pattern): self
    {
        $this->pattern = $pattern;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'tileId' => $this->getTileId(),
            'coordinates' => $this->getCoordinates(),
            'total' => $this->getCount(),
            'pattern' => $this->getPattern()
        ];
    }
}
