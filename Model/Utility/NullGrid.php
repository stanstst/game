<?php
namespace Model\Utility;

use Model\Ship;

class NullGrid extends \Model\SquareGrid
{

    public function __construct()
    {
    }

    public function placeShip(Ship $ship)
    {
    }

    public function getIterator()
    {
        return array();
    }
}
