<?php

namespace View\Web;


use View\BaseView;
use View\PointStatusDisplayerPlay;

class GridPlay extends BaseView
{

    /**
     *
     * @var HtmlPage
     */
    protected $page;

    /**
     *
     * @var PointStatusDisplayerPlay
     */

    protected $pointDisplayer;

    /**
     *
     * @param HtmlPage $page
     * @param PointStatusDisplayerPlay $pointDisplayer
     */
    public function __construct(HtmlPage $page, PointStatusDisplayerPlay $pointDisplayer)
    {
        $this->page = $page;
        $this->pointDisplayer = $pointDisplayer;
    }

    public function display()
    {
        $this->page->setContent(
            $this->getHtmlContent()
        );
        $this->page->display();
    }

    protected function getHtmlContent()
    {
        $content = 'Play Game<br />';
        $content .= ($this->grid->getUserHits() == $this->grid->getOccupiedPoints()) ?
            'Congrats! You have won!<br />' : '';
        $content .= 'Number trys: ' . $this->grid->getTries();
        $content .= ', Hit status: ' . $this->grid->getHitStatus() . '<br />';
        $content .= $this->hasError() ?
            '<p>Error: ' . $this->getError() . '</p>' : '';
        $content .= '<pre>';
        $content .= '   1    2    3    4    5    6    7    8    9    10' . '<br />';
        $counterAscii = 65;
        foreach ($this->grid->getIterator() as $c => $row) {
            $content .= chr($counterAscii++);
            foreach ($row as $s => $spot) {
                $content .= $this->pointDisplayer->get($spot);
            }
            $content .= '<br />';
        }
        $content .= '</pre><br />';
        $content .= '<form action="/?playGame-execute" method="post">';
        $content .= '<input name="point" type="text" autofocus /><br />';
        $content .= '<input type="submit"/>';
        $content .= '</form><br />';
        $content .= '<a href="/?showGame-execute" target="_blank">Show ships</a>';
        $content .= '<br /><br /><a href="/" >New Game</a>';
        return $content;
    }

}
