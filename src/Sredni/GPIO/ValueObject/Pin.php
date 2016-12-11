<?php

namespace Sredni\GPIO\ValueObject;

class Pin
{
    private $number;

    /**
     * @param int $number
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function number() : int
    {
        return $this->number;
    }
}