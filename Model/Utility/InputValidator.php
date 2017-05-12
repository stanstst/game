<?php

namespace Model\Utility;

class InputValidator
{

    /**
     *
     * @var Position
     */
    protected $point;

    /**
     *
     * @var \Model\SquareGrid
     */
    protected $grid;

    public function __construct(\Model\SquareGrid $grid, Position $point)
    {
        $this->grid = $grid;
        $this->point = $point;
    }

    /**
     *
     * @param string $input
     *
     * @throws \Exception
     */
    public function validatePoint($input)
    {

        if (strlen($input) < 2) {
            throw new \Exception('Invalid input - length.');
        }
        $split[0] = substr($input, 0, 1);
        $split[1] = substr($input, 1);

        $split[0] = ord(strtoupper($split[0])) - 65;
        $split[1] = ((int)$split[1]) - 1;

        if ($split[0] < 0 || $split[1] < 0) {
            throw new \Exception('Invalid input - coordinates out of grid range - negative.');
        }

        if ($split[0] > ($this->grid->getSize() - 1) || $split[1] > ($this->grid->getSize() - 1)) {
            throw new \Exception('Invalid input - coordinates out of grid range.');
        }

        $this->point->x = $split[0];
        $this->point->y = $split[1];
    }

    /**
     *
     * @return Position
     */
    public function getPoint()
    {
        return $this->point;
    }

}
