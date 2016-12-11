<?php

namespace Sredni\GPIO\Platform\Raspberry;

use Sredni\GPIO\Platform\StandardPlatform;

class RaspberryPiRev2 extends StandardPlatform
{
    protected $pinMap = [
        4 => 4,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 11,
        17 => 17,
        18 => 18,
        22 => 22,
        23 => 23,
        24 => 24,
        25 => 25,
        27 => 27,
    ];
    protected $gpioPath = '/sys/class/gpio';
}