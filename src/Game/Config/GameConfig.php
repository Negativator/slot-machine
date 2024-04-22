<?php

namespace Application\Game\Config;

class GameConfig
{
    private array $config;

    public function __construct()
    {
        $this->config = json_decode(file_get_contents(__DIR__ . '/config.json'), true);
    }

    public function getConfigKey(string $key): array
    {
        if (!array_key_exists($key, $this->config)) {
            throw new \Exception('Choose a valid config element');
        }
        return  $this->config[$key];
    }
}
