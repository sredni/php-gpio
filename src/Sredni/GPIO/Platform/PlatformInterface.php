<?php

namespace Sredni\GPIO\Platform;

use Sredni\GPIO\ValueObject\Pin;

interface PlatformInterface
{

    /**
     * @param Pin $pin
     * @return bool
     */
    public function hasPin(Pin $pin) : bool;

    /**
     * @param Pin $pin
     * @return string
     */
    public function getPinTarget(Pin $pin) : string;

    /**
     * @param Pin $pin
     * @return string
     */
    public function getPinPath(Pin $pin) : string;

    /**
     * @param Pin $pin
     * @return string
     */
    public function getPinValuePath(Pin $pin) : string;

    /**
     * @param Pin $pin
     * @return string
     */
    public function getPinDirectionPath(Pin $pin) : string;

    /**
     * @return string
     */
    public function getExportPath() : string;

    /**
     * @return string
     */
    public function getUnexportPath() : string;
}