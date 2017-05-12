<?php


namespace Factory;


use Model\SquareGrid;
use Model\Utility\AllocatorGenerator;
use Model\Utility\HorizontalAllocator;
use Model\Utility\PointStatus;
use Model\Utility\VerticalAllocator;

abstract class BaseFactory
{
    public abstract function create();

    public static function instance()
    {
        return new static();
    }

    /**
     * @return SquareGrid
     */
    protected function getGrid()
    {
        $grid = new SquareGrid(new AllocatorGenerator(new HorizontalAllocator(),
            new VerticalAllocator()), new PointStatus());
        return $grid;
    }
}