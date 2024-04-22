<?php

use Application\Game\Config\GameConfig;
use PHPUnit\Framework\TestCase;

class GameConfigTest extends TestCase
{
    private GameConfig $sut;

    public function setUp(): void
    {
        $this->sut = new GameConfig();
    }

    public function testClassExists(): void
    {
        static::assertInstanceOf(GameConfig::class, $this->sut);
    }

    public function testGetConfigKey(): void
    {
        static::assertIsArray($this->sut->getConfigKey('tiles'));
    }

    public function testGetConfigKeyThrowsException(): void
    {
        static::expectException(Exception::class);
        static::expectExceptionMessage('Choose a valid config element');

        $this->sut->getConfigKey('wrongKey');
    }
}
