<?php

namespace Sredni\GPIO\ValueObject;

class Value
{
    const ON = 1;
    const OFF = 0;
    const AVAILABLE_VALUES = [
        self::ON,
        self::OFF
    ];

    private $value;

    /**
     * Value constructor.
     * @param int $value
     * @throws \Exception
     */
    public function __construct(int $value)
    {
        if (!in_array($value, self::AVAILABLE_VALUES)) {
            throw new \Exception('Unknown value:' . $value);
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value() : int
    {
        return $this->value;
    }
}