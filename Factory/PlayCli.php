<?php

namespace Factory;

use Controller\Play;
use Model\GridFieldHitter;
use Model\Utility\CliPersistor;
use Model\Utility\InputValidator;
use Model\Utility\Position;
use Request\Cli;
use View\Cli\GridPlay;
use View\PointStatusDisplayerPlay;

class PlayCli extends BaseFactory
{
    public function create()
    {
        $grid = $this->getGrid();
        $controller =
            new Play(new GridFieldHitter($grid, new CliPersistor(), new InputValidator($grid, new Position())),
                new GridPlay(new PointStatusDisplayerPlay()),
                new Cli());
        return $controller;
    }
}