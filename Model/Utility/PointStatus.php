<?php

namespace Model\Utility;

class PointStatus
{

    const BLANK = 'blank-PointStatus';
    const SHIP = 'ship-PointStatus';
    const HIT = 'hit-PointStatus';
    const MISS = 'miss-PointStatus';

    protected $status;

    public function setBlank()
    {
        $this->status = self::BLANK;
    }

    public function setShip()
    {
        $this->status = self::SHIP;
    }

    public function setHit()
    {
        $this->status = self::HIT;
    }

    public function setMiss()
    {
        $this->status = self::MISS;
    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->status;
    }

    public function isBlank()
    {
        return $this->status === self::BLANK;
    }

    public function isShip()
    {
        return $this->status === self::SHIP;
    }

    public function isHit()
    {
        return $this->status === self::HIT;
    }

    public function isMiss()
    {
        return $this->status === self::MISS;
    }

}
