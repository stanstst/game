<?php

namespace Factory;

use Controller\Start;
use Model\GridFieldInitializer;
use Model\Ship;
use Model\Utility\CliPersistor;
use View\Cli\GridPlay;
use View\PointStatusDisplayerPlay;

class StartCli extends BaseFactory
{

    /**
     * @return Start
     */
    public function create()
    {
        $controller =
            new Start($this->getGridInitializer(),
                new GridPlay(new PointStatusDisplayerPlay()));

        return $controller;
    }


}