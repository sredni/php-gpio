<?php

namespace Sredni\GPIO\Platform\Odroid;

use Sredni\GPIO\Platform\StandardPlatform;

class OdroidXU extends StandardPlatform
{
    protected $pinMap = [
        13 => 309,
        14 => 316,
        15 => 306,
        16 => 304,
        17 => 310,
        18 => 307,
        19 => 319,
        20 => 317,
        21 => 318,
        22 => 320,
        23 => 315,
        24 => 314,
        25 => 311,
        26 => 313,
        27 => 323,
    ];
    protected $gpioPath = '/sys/class/gpio';
}