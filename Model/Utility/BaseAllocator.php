<?php

namespace Model\Utility;

use Model\SquareGrid;
use Model\Ship;

abstract class BaseAllocator implements Allocator
{
    const MAX_NUMBER_PLACE_TRIES = 70;
    const MAX_NUMBER_POSITION_TRIES = 20;
    /**
     *
     * @var SquareGrid
     */
    protected $grid;

    /**
     *
     * @var Ship
     */
    protected $ship;

    /**
     * @var int
     */
    protected static $allocatedShipsNumber = 0;

    /**
     *
     * @param integer $level
     */
    protected abstract function getPosition($level = 0);

    /**
     * @param Position $position
     * @param integer $level
     */
    protected abstract function placeShip(Position $position, $level = 0);

    /**
     *
     * @param Position $position
     */
    protected abstract function isClearSpace(Position $position);

    /**
     * @param SquareGrid $grid
     * @param Ship $ship
     * @param int $level
     * @throws \Exception
     */
    public function allocate(SquareGrid $grid, Ship $ship, $level = 0)
    {
        if ($level > self::MAX_NUMBER_PLACE_TRIES) {
            throw new \Exception('Game not created. Please try again.');
        }

        $this->grid = $grid;
        $this->ship = $ship;
        $position = $this->getPosition();
        try {
            $this->placeShip($position);
        } catch (\Exception $exc) {
            $this->allocate($this->grid, $this->ship, ++$level);
        }
    }

    /**
     * @return int
     */
    protected function getRandomIndex()
    {
        return rand(0, $this->grid->getSize() - 1);
    }

    /**
     * @return int
     */
    protected function getShipStern()
    {
        return $this->ship->getSize() - 1;
    }
}
