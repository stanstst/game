<?php

namespace View;

use Model\SquareGrid;

interface MvcView
{

    public function display();

    /**
     *
     * @param SquareGrid $grid
     */
    public function pushData(SquareGrid $grid);

    /**
     *
     * @param string $message
     */
    public function setError($message);
}
