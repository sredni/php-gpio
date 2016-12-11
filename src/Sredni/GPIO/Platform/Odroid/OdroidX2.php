<?php

namespace Sredni\GPIO\Platform\Odroid;

use Sredni\GPIO\Platform\StandardPlatform;

class OdroidX2 extends StandardPlatform
{
    protected $pinMap = [
        17 => '112',
        18 => '115',
        19 => '93',
        20 => '100',
        21 => '108',
        22 => '91',
        23 => '90',
        24 => '99',
        25 => '111',
        26 => '103',
        27 => '88',
        28 => '98',
        29 => '89',
        30 => '114',
        31 => '87',
        33 => '94',
        34 => '105',
        35 => '97',
        36 => '102',
        37 => '107',
        38 => '110',
        39 => '101',
        40 => '117',
        41 => '92',
        42 => '96',
        43 => '116',
        44 => '106',
        45 => '109',
    ];
    protected $gpioPath = '/sys/class/gpio';
}