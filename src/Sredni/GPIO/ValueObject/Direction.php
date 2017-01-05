<?php

namespace Sredni\GPIO\ValueObject;

class Direction
{
    const IN = 'in';
    const OUT = 'out';
    const AVAILABLE_DIRECTIONS = [
        self::IN,
        self::OUT
    ];

    private $direction;

    /**
     * @param string $direction
     * @throws \Exception
     */
    public function __construct(string $direction)
    {
        if (!in_array($direction, self::AVAILABLE_DIRECTIONS)) {
            throw new \Exception('Unknown direction:' . $direction);
        }

        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function direction() : string
    {
        return $this->direction;
    }

    /**
     * @return Direction
     */
    public function getOpposed() : self
    {
        return new self($this->direction === self::IN ? self::OUT : self::IN);
    }
}