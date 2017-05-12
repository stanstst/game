<?php

namespace Model;

class Ship
{

    /**
     *
     * @var int
     */
    protected $size;

    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

}
