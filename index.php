<?php

use Application\Game\SlotMachine;

require_once __DIR__ . '/vendor/autoload.php';

$stake = readline('Input a float number: ');

$slot = new SlotMachine();
try {
    $slot->spin($stake);
} catch (Exception $e) {
}