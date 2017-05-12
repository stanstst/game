<?php

namespace Model\Utility;

class HorizontalAllocator extends BaseAllocator
{


    protected function getPosition($level = 0)
    {
        if ($level > 20) {
            throw new \Exception('Game not created(position). Please try again.');
        }

        $x = $this->getRandomIndex();
        $y = $this->getRandomIndex();

        $valid = ($y + $this->ship->getSize()) <= ($this->grid->getSize() - 1);

        if ($valid) {
            $position = new Position($x, $y);
            return $position;
        }
        $position = $this->getPosition(++$level);
        return $position;
    }

    /**
     *
     * @param Position $position
     * @param int $level
     * @throws \Exception
     */
    protected function placeShip(Position $position, $level = 0)
    {
        if ($level > self::MAX_NUMBER_PLACE_TRIES) {
            throw new \Exception('Game not created. Please try again.');
        }
        $isClear = $this->isClearSpace($position);
        if ($isClear) {
            for ($n = $position->y; $n <= $this->getSternOnGrid($position); $n++) {
                $this->grid->getIterator()[$position->x][$n]->setShip();
            }
            $this->grid->addOccupiedPoints($this->ship->getSize());
        } else {
            $this->placeShip($position, ++$level);
        }
    }

    /**
     * @param Position $position
     * @return boolean
     */
    protected function isClearSpace(Position $position)
    {
        $valid = true;
        for ($n = $position->y; $n <= $this->getSternOnGrid($position); $n++) {
            $valid = $valid && $this->grid->getIterator()[$position->x][$n]->isBlank();
        }

        return $valid;
    }

    /**
     * @param Position $position
     * @return int|null
     */
    protected function getSternOnGrid(Position $position)
    {
        return $position->y + $this->getShipStern();
    }

}
