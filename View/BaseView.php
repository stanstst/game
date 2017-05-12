<?php

namespace View;

use Model\SquareGrid;

abstract class BaseView implements MvcView
{

    /**
     *
     * @var string
     */
    protected $errorMessage;

    /**
     *
     * @var \Model\SquareGrid
     */
    protected $grid;

    public function setError($message)
    {
        $this->errorMessage = $message;
    }

    public function getError()
    {
        return $this->errorMessage;
    }

    public function hasError()
    {
        return !empty($this->errorMessage);
    }

    public function pushData(SquareGrid $grid)
    {
        $this->grid = $grid;
    }

}
