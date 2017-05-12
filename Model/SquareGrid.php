<?php

namespace Model;

use Model\Utility\AllocatorGenerator;
use Model\Utility\PointStatus;

class SquareGrid
{

    const SIZE = 10;
    const START_INDEX = 0;

    /**
     *
     * @var PointStatus[][]
     */
    protected $data = [];

    /**
     *
     * @var AllocatorGenerator
     */
    protected $allocator;

    /**
     *
     * @var Utility\PointStatus
     */
    protected $pointStatusProtype;

    /**
     *
     * @var int
     */
    protected $userTries;

    /**
     *
     * @var int
     */
    protected $userHits;

    /**
     *
     * @var int
     */
    protected $occupiedPoints;

    /**
     *
     * @var string
     */
    protected $userHitStatus;

    /**
     * @var bool
     */
    protected $isSunk = fase;

    protected $allocatedShips = [];

    /**
     * @param AllocatorGenerator $allocator
     * @param PointStatus $pointStatus
     */
    public function __construct(AllocatorGenerator $allocator, Utility\PointStatus $pointStatus)
    {
        $this->allocator = $allocator;
        $this->pointStatusProtype = $pointStatus;
        $this->intData();
        $this->userTries = self::START_INDEX;
        $this->userHits = self::START_INDEX;
        $this->occupiedPoints = 0;
    }

    protected function intData()
    {
        for ($x = self::START_INDEX; $x < self::SIZE; $x++) {
            for ($y = self::START_INDEX; $y < self::SIZE; $y++) {
                $pointStatus = clone $this->pointStatusProtype;
                $pointStatus->setBlank();
                $this->data[$x][$y] = $pointStatus;
            }
        }
    }

    /**
     *
     * @param \Model\Ship $ship
     */
    public function placeShip(Ship $ship)
    {
        $this->allocator->allocate($this, $ship);
    }

    public function hitPoint(Utility\Position $point)
    {
        var_dump($this->allocatedShips);
        /** @var PointStatus $pointStatus */
        $pointStatus = $this->data[$point->x][$point->y];
        $this->userHitStatus = '';

        if ($pointStatus->isShip() && !$pointStatus->isHit()) {
            $pointStatus->setHit();
            $this->userTries++;
            $this->userHits++;
            $this->userHitStatus = 'hit';
        } elseif (!$pointStatus->isMiss() && !$pointStatus->isHit()) {
            $pointStatus->setMiss();
            $this->userTries++;
            $this->userHitStatus = 'miss';
        } else {
            $this->userHitStatus = 'already tried';
        }
    }

    public function getSize()
    {
        return self::SIZE;
    }

    /**
     * @return PointStatus[][]
     */
    public function getIterator()
    {
        return $this->data;
    }

    /**
     *
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function getTries()
    {
        return $this->userTries;
    }

    public function getHitStatus()
    {
        return $this->userHitStatus;
    }

    public function getUserHits()
    {
        return $this->userHits;
    }

    public function getOccupiedPoints()
    {
        return $this->occupiedPoints;
    }

    public function addOccupiedPoints($n)
    {
        return $this->occupiedPoints += $n;
    }

    /**
     * @return mixed
     */
    public function isSunk()
    {
        return $this->isSunk;
    }

    public function addAllocatedShip($shipNumber, $x, $y)
    {
        $this->allocatedShips[$shipNumber][$this->getXyKeyForAllocatedShip($x, $y)] = 'not-hit';
    }

    /**
     * @param $x
     * @param $y
     * @return string
     */
    protected function getXyKeyForAllocatedShip($x, $y)
    {
        return $x . '-' . $y;
    }

}
