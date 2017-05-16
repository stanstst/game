<?php

namespace View\Cli;

use View\BaseView;

class GridPlay extends BaseView
{
    /**
     *
     * @var \View\PointStatusDisplayerPlay
     */
    protected $pointDisplayer;

    /**
     *
     * @param \View\PointStatusDisplayerPlay $pointDisplayer
     */
    public function __construct(\View\PointStatusDisplayerPlay $pointDisplayer)
    {
        $this->pointDisplayer = $pointDisplayer;
    }

    public function display()
    {
        echo $this->getContent();
    }

    protected function getContent()
    {
        $content = '' . PHP_EOL;
        $content .= $this->hasUserWon() ?
            'Well done! You completed the game in ' . $this->grid->getTries() . ' shots' . PHP_EOL . PHP_EOL : '';
        $content .= '*** ' . $this->grid->getHitStatus() . ' ***' . PHP_EOL;
        $content .= $this->hasError() ?
            PHP_EOL . 'Error: ' . $this->getError() . PHP_EOL : '';
        $content .= '  1  2  3  4  5  6  7  8  9  10' . PHP_EOL;
        $counterAscii = 65;
        foreach ($this->grid->getIterator() as $c => $column) {
            $content .= chr($counterAscii++);
            foreach ($column as $r => $spot) {
                $content .= $this->pointDisplayer->get($spot);
            }
            $content .= PHP_EOL;
        }
        return $content;
    }
}
