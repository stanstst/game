<?php

namespace Factory;

use Controller\Start;
use View\Web\GridPlay;
use View\PointStatusDisplayerPlay;
use View\Web\HtmlPage;

class StartWeb extends BaseFactory
{
    /**
     * @return Start
     */
    public function create()
    {
        $controller =
            new Start($this->getGridInitializer(),
                new GridPlay(new HtmlPage(), new PointStatusDisplayerPlay()));

        return $controller;
    }
}