<?php

namespace Factory;

use Controller\Show;
use View\Cli\GridShow;
use View\PointStatusDisplayerShow;

class ShowCli extends BaseFactory
{
    public function create()
    {
       $controller = new Show($this->getGridInitializer(),new GridShow(new PointStatusDisplayerShow()));
       return $controller;
    }
}