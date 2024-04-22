<?php

namespace Application\Console;

class ConsoleTableGenerator
{
    private int $maxLength = 2;

    public function setMaxLength(int $length): self
    {
        $this->maxLength = $length;
        return $this;
    }

    public function generate(array $rows): void
    {
        $mask = '|' . '%' . $this->maxLength . 's';
        foreach ($rows as $row) {
            echo vsprintf(str_repeat($mask, count($row)), $row);
            echo PHP_EOL;
        }
    }
}
