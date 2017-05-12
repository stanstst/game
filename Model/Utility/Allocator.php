<?php

namespace Model\Utility;

use Model\SquareGrid;
use Model\Ship;

interface Allocator
{
    public function allocate(SquareGrid $grid, Ship $ship);
}
