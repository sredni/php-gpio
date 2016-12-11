<?php

namespace Sredni\GPIO\Platform\Raspberry;

use Sredni\GPIO\Platform\StandardPlatform;

class RaspberryPiBPlus extends StandardPlatform
{
    protected $pinMap = [
        4 => 4,
        5 => 5,
        6 => 6,
        12 => 12,
        13 => 13,
        16 => 16,
        17 => 17,
        18 => 18,
        19 => 19,
        20 => 20,
        21 => 21,
        22 => 22,
        23 => 23,
        24 => 24,
        25 => 25,
        26 => 26,
        27 => 27,
    ];
    protected $gpioPath = '/sys/class/gpio';
}