<?php

namespace Factory;

use Controller\Play;
use Model\GridFieldHitter;
use Model\Utility\InputValidator;
use Model\Utility\Position;
use Model\Utility\WebPersistor;
use Request\Http;
use View\Web\GridPlay;
use View\PointStatusDisplayerPlay;
use View\Web\HtmlPage;

class PlayWeb extends BaseFactory
{
    public function create()
    {
        $grid = $this->getGrid();
        $controller =
            new Play(new GridFieldHitter($grid, new WebPersistor(), new InputValidator($grid, new Position())),
                new GridPlay(new HtmlPage(), new PointStatusDisplayerPlay()),
                new Http());
        return $controller;
    }
}