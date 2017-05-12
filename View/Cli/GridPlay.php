<?php

namespace View\Cli;

class GridPlay extends \View\BaseView
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
        $content = 'Play Game' . PHP_EOL;
        $content .= ($this->grid->getUserHits() == $this->grid->getOccupiedPoints()) ?
            'Congrats! You have won!' . PHP_EOL . PHP_EOL : '';
        $content .= 'Number trys: ' . $this->grid->getTries();
        $content .= ', Hit status: ' . $this->grid->getHitStatus() . PHP_EOL;
        $content .= $this->hasError() ?
            PHP_EOL . 'Error: ' . $this->getError() . PHP_EOL : '';
        $content .= '   1    2    3    4    5    6    7    8    9    10' . PHP_EOL;
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
