<?php

namespace Sredni\GPIO\Platform;

use Sredni\GPIO\ValueObject\Pin;

abstract class StandardPlatform implements PlatformInterface
{
    protected $pinMap = [];
    protected $gpioPath = '';

    /**
     * @inheritdoc
     */
    public function hasPin(Pin $pin) : bool
    {
        return isset($this->pinMap[$pin->number()]);
    }

    /**
     * @param Pin $pin
     * @return string
     * @throws \Exception
     */
    public function getPinTarget(Pin $pin) : string
    {
        if (!$this->hasPin($pin)) {
            throw new \Exception('No mapping for pin:'. $pin->number());
        }

        return $this->pinMap[$pin->number()];
    }

    /**
     * @inheritdoc
     */
    public function getPinPath(Pin $pin) : string
    {
        return $this->gpioPath . '/gpio' . $this->getPinTarget($pin);
    }

    /**
     * @inheritdoc
     */
    public function getPinValuePath(Pin $pin) : string
    {
        return $this->getPinPath($pin) . '/value';
    }

    /**
     * @inheritdoc
     */
    public function getPinDirectionPath(Pin $pin) : string
    {
        return $this->getPinPath($pin) . '/direction';
    }

    /**
     * @inheritdoc
     */
    public function getExportPath() : string
    {
        return $this->gpioPath . '/export';
    }

    /**
     * @inheritdoc
     */
    public function getUnexportPath() : string
    {
        return $this->gpioPath . '/unexport';
    }
}