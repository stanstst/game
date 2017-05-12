<?php

namespace Model;

use Model\Utility\WebPersistor;
use Model\Utility\Persistor;
use Model\Utility\InputValidator;

class GridFieldHitter
{
    /**
     *
     * @var SquareGrid
     */
    protected $grid;

    /**
     * @var WebPersistor
     */
    protected $persistor;

    /**
     *
     * @var Utility\InputValidator
     */
    protected $validator;
    protected $shipStartList = array(4, 3, 2, 2);

    /**
     * @param SquareGrid $grid
     * @param Persistor $persistor
     * @param InputValidator $validator
     */
    public function __construct(SquareGrid $grid, Persistor $persistor, InputValidator $validator)
    {
        $this->grid = $grid;
        $this->persistor = $persistor;
        $this->validator = $validator;
    }

    public function play($input)
    {
        $this->grid = $this->persistor->get('grid');

        $this->validator->validatePoint($input);
        $point = $this->validator->getPoint();
        $this->grid->hitPoint($point);
        $this->persistor->persist($this->grid, 'grid');
    }

    public function getGrid()
    {
        return $this->grid;
    }
}