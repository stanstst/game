<?php

namespace Model\Utility;

class Position
{

    /**
     *
     * @var int
     */
    public $x;

    /**
     *
     * @var int
     */
    public $y;

    /*
     *
     */
    public $orientation;

    public function __construct($x = null, $y = null, $orientation = null)
    {
        $this->x = $x;
        $this->y = $y;
        $this->orientation = $orientation;
    }

}
