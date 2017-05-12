<?php

namespace Factory;

use Model\GridFieldInitializer;
use Model\Ship;
use Model\SquareGrid;
use Model\Utility\AllocatorGenerator;
use Model\Utility\CliPersistor;
use Model\Utility\HorizontalAllocator;
use Model\Utility\Persistor;
use Model\Utility\PointStatus;
use Model\Utility\VerticalAllocator;
use Model\Utility\WebPersistor;

abstract class BaseFactory
{
    private $environment;

    public abstract function create();

    /**
     * BaseFactory constructor.
     * @param $environment
     */
    public function __construct($environment)
    {
        $this->environment = $environment;
    }

    public static function instance($environment)
    {
        return new static($environment);
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

    /**
     * @return GridFieldInitializer
     */
    protected function getGridInitializer()
    {
        return new GridFieldInitializer($this->getGrid(),
            new Ship(),
            $this->getPersistor());
    }

    /**
     * @return Persistor
     */
    protected function getPersistor()
    {
        if ($this->environment === 'cli') {
            return new CliPersistor();
        }
        return new WebPersistor();
    }
}