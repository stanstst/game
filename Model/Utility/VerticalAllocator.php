<?php

namespace Model\Utility;

class VerticalAllocator extends BaseAllocator
{

    protected function getPosition($level = 0)
    {
        if ($level > self::MAX_NUMBER_POSITION_TRIES) {
            throw new \Exception('Game not created(position). Please try again.');
        }

        $x = $this->getRandomIndex();
        $y = $this->getRandomIndex();
        $valid = ($x + $this->ship->getSize()) <= ($this->grid->getSize() - 1);

        if ($valid) {
            $position = new Position($x, $y);
            return $position;
        }
        $position = $this->getPosition(++$level);
        return $position;
    }

    protected function placeShip(Position $position, $level = 0)
    {
        if ($level > self::MAX_NUMBER_PLACE_TRIES) {
            throw new \Exception('Game not created. Please try again.');
        }
        if ($this->isClearSpace($position)) {
            for ($n = $position->x; $n <= $this->getSternOnGrid($position); $n++) {
                $this->grid->getIterator()[$n][$position->y]->setShip();
                $this->grid->addAllocatedShip(static::$allocatedShipsNumber, $n, $position->y);
            }
            static::$allocatedShipsNumber++;
            $this->grid->addOccupiedPoints($this->ship->getSize());
        } else {
            $this->placeShip($position, ++$level);
        }
    }

    protected function isClearSpace(Position $position)
    {
        $valid = true;

        for ($n = $position->x; $n <= $this->getSternOnGrid($position); $n++) {
            $valid = $valid && $this->grid->getIterator()[$n][$position->y]->isBlank();
        }

        return $valid;
    }

    /**
     * @param Position $position
     * @return int|null
     */
    protected function getSternOnGrid(Position $position)
    {
        return $position->x + $this->getShipStern();
    }
}
