<?php

namespace Model;

use Model\Utility\WebPersistor;
use Model\Utility\Persistor;

class GridFieldInitializer
{
    /**
     *
     * @var GridField
     */
    protected $gridField;

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

    protected $shipStartList = [4, 3, 2, 2];

    public function __construct(SquareGrid $grid, Ship $shipPrototype, Persistor $persistor)
    {
        $this->grid = $grid;
        $this->shipPrototype = $shipPrototype;
        $this->persistor = $persistor;
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