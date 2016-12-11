PHP GPIO library
================
Easy way to manage gpio ports (for Arduino, Odroid and others)<br>
It is easy to extend for boards other than available "out of box"

Examples
========

Write

``` php
require 'vendor/autoload.php';

use Sredni\GPIO\Platform\Odroid\OdroidX2;
use Sredni\GPIO\Sevice\GPIOService;
use Sredni\GPIO\ValueObject\Pin;
use Sredni\GPIO\ValueObject\Direction;
use Sredni\GPIO\ValueObject\Value;

$gpio = new GPIOService(new OdroidX2());
$pin = new Pin(17);
$direction = new Direction(Direction::OUT);
$valueOn = new Value(Value::ON);
$valueOff = new Value(Value::OFF);

echo "Setting up pin 17\n";
$gpio->setup($pin, $direction);

echo "Turning on pin 17\n";
$gpio->write($pin, $valueOn);

echo "Sleeping!\n";
sleep(3);

echo "Turning off pin 17\n";
$gpio->write($pin, $valueOff);

echo "Unexport pin 17\n";
$gpio->unset($pin);
```

Read

``` php
require 'vendor/autoload.php';

use Sredni\GPIO\Platform\Odroid\OdroidX2;
use Sredni\GPIO\Sevice\GPIOService;
use Sredni\GPIO\ValueObject\Pin;
use Sredni\GPIO\ValueObject\Direction;

$gpio = new GPIOService(new OdroidX2());
$pin = new Pin(17);
$direction = new Direction(Direction::IN);

echo "Setting up pin 17\n";
$gpio->setup($pin, $direction);

echo "Retrieving value of pin 17\n";
echo $gpio->read($pin);

echo "Unexport pin 17\n";
$gpio->unset($pin);
```

TODO
====
Tests!!!

Highly inspired by:
===================
* [ronanguilloux/php-gpio](https://github.com/ronanguilloux/php-gpio)
* [mlinuxguy/odpygpio](https://github.com/mlinuxguy)
