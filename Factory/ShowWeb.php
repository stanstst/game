<?php

namespace Factory;

use Controller\Show;
use View\Web\GridShow;
use View\PointStatusDisplayerShow;
use View\Web\HtmlPage;

class ShowWeb extends BaseFactory
{
    public function create()
    {
        $controller =
            new Show($this->getGridInitializer(), new GridShow(new HtmlPage(), new PointStatusDisplayerShow()));
        return $controller;
    }
}