<?php

namespace View\Cli;

use View\MvcView;

class GridShow extends \View\BaseView
{

    /**
     *
     * @var \View\PointStatusDisplayerShow
     */
    protected $pointDisplayer;

    /**
     *
     * @param \View\PointStatusDisplayerPlay $pointDisplayer
     */
    public function __construct(\View\PointStatusDisplayerShow $pointDisplayer)
    {
        $this->pointDisplayer = $pointDisplayer;
    }

    public function display()
    {
        print $this->getContent();
    }

    protected function getContent()
    {
        $content = 'Snow Game.' . PHP_EOL . PHP_EOL;
        $content .= ($this->grid->getUserHits() == $this->grid->getOccupiedPoints()) ?
            'Congrats! You have won!' . PHP_EOL . PHP_EOL : '';

        $content .= 'Number tries: ' . $this->grid->getTries() . PHP_EOL . PHP_EOL;
        $content .= $this->hasError() ?
            PHP_EOL . 'Error: ' . $this->getError() . PHP_EOL : '';
        $content .= '  1  2  3  4  5  6  7  8  9  10' . PHP_EOL;
        $counterAscii = 65;
        foreach ($this->grid->getIterator() as $c => $row) {
            $content .= chr($counterAscii++);
            foreach ($row as $s => $spot) {
                $content .= $this->pointDisplayer->get($spot);
            }
            $content .= PHP_EOL;
        }
        return $content;
    }

}
