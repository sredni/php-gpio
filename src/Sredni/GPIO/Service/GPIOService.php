<?php

namespace Sredni\GPIO\Service;

use Sredni\GPIO\Platform\PlatformInterface;
use Sredni\GPIO\ValueObject\Direction;
use Sredni\GPIO\ValueObject\Pin;
use Sredni\GPIO\ValueObject\Value;

class GPIOService
{
    private $platform;

    /**
     * @param PlatformInterface $platform
     */
    public function __construct(PlatformInterface $platform)
    {
        $this->platform = $platform;
    }

    /**
     * @param Pin $pin
     * @param Direction $direction
     * @throws \Exception
     */
    public function setup(Pin $pin, Direction $direction)
    {
        if ($this->isPinAlreadySet($pin, $direction->getOpposed())) {
            throw new \Exception('Pin is already exported and/or have wrong direction');
        }

        $this->writeData($this->platform->getExportPath(), $this->platform->getPinTarget($pin));
        $this->writeData($this->platform->getPinDirectionPath($pin), $direction->direction());
    }

    /**
     * @param Pin $pin
     */
    public function unset(Pin $pin)
    {
        $this->writeData($this->platform->getUnexportPath(), $this->platform->getPinTarget($pin));
    }

    /**
     * @param Pin $pin
     * @param Value $value
     * @throws \Exception
     */
    public function write(Pin $pin, Value $value)
    {
        if (!$this->isPinAlreadySet($pin, new Direction(Direction::OUT))) {
            throw new \Exception('Pin is not exported yet or have wrong direction');
        }

        $this->writeData($this->platform->getPinValuePath($pin), $value->value());
    }

    /**
     * @param Pin $pin
     * @return string
     * @throws \Exception
     */
    public function read(Pin $pin)
    {
        if (!$this->isPinExported($pin)) {
            throw new \Exception('Pin is not exported');
        }

        return $this->readData($this->platform->getPinValuePath($pin));
    }

    /**
     * @param Pin $pin
     * @param Direction $direction
     * @return bool
     */
    public function isPinAlreadySet(Pin $pin, Direction $direction) {
        return ($this->isPinExported($pin) && $this->pinHaveDirection($pin, $direction));
    }

    /**
     * @param Pin $pin
     * @return bool
     * @throws \Exception
     */
    public function isPinExported(Pin $pin) : bool
    {
        if (!$this->isPinAvailable($pin)) {
            throw new \Exception('Wrong pin');
        }

        return file_exists($this->platform->getPinPath($pin));
    }

    /**
     * @param Pin $pin
     * @return bool
     */
    private function isPinAvailable(Pin $pin) : bool
    {
        return $this->platform->hasPin($pin);
    }

    /**
     * @param Pin $pin
     * @param Direction $direction
     * @return bool
     * @throws \Exception
     */
    private function pinHaveDirection(Pin $pin, Direction $direction) : bool
    {
        if (!$this->isPinExported($pin)) {
            throw new \Exception('Pin is not Exported');
        }

        return ($this->readData($this->platform->getPinDirectionPath($pin)) == $direction->direction());
    }

    /**
     * @param string $target
     * @return string
     */
    private function readData(string $target) : string
    {
        return trim(file_get_contents($target));
    }

    /**
     * @param string $target
     * @param mixed $value
     */
    private function writeData(string $target, $value) : void
    {
        file_put_contents($target, trim($value));
    }
}