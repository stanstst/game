<?php

namespace Model;

use Model\Utility\WebPersistor;
use Model\Utility\Persistor;

class GridFieldInitializer
{
    /**
     *
     * @var SquareGrid
     */
    protected $grid;

    /**
     *
     * @var Ship
     */
    protected $shipPrototype;

    /**
     * @var WebPersistor
     */
    protected $persistor;

    protected $shipStartList = [];

    /**
     * GridFieldInitializer constructor.
     * @param SquareGrid $grid
     * @param Ship $shipPrototype
     * @param Persistor $persistor
     * @param $shipStartList
     */
    public function __construct(SquareGrid $grid, Ship $shipPrototype, Persistor $persistor, $shipStartList)
    {
        $this->grid = $grid;
        $this->shipPrototype = $shipPrototype;
        $this->persistor = $persistor;
        $this->shipStartList = $shipStartList;
    }

    /**
     *
     * @return SquareGrid
     */
    public function generateNew()
    {

        foreach ($this->shipStartList as $length) {
            /** @var Ship $a */
            $ship = clone $this->shipPrototype;
            $ship->setSize($length);
            $this->grid->placeShip($ship);
        }

        $this->persistor->persist($this->grid, 'grid');
    }

    public function load()
    {
        $this->grid = $this->persistor->get('grid');
    }

    /**
     * @return SquareGrid
     */
    public function getGrid()
    {
        return $this->grid;
    }
}