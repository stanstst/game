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
        $content = '';
        $content .= ($this->grid->getUserHits() == $this->grid->getOccupiedPoints()) ?
            'Well done! You completed the game in ' . $this->grid->getTries() . ' shots<br />' : '';
        $content .= '*** ' . $this->grid->getHitStatus() . '*** ' . '<br />';
        $content .= $this->hasError() ?
            '<p>Error: ' . $this->getError() . '</p>' : '';
        $content .= '<pre>';
        $content .= '  1  2  3  4  5  6  7  8  9  10' . '<br />';
        $counterAscii = 65;
        foreach ($this->grid->getIterator() as $c => $row) {
            $content .= chr($counterAscii++);
            foreach ($row as $s => $spot) {
                $content .= $this->pointDisplayer->get($spot);
            }
            $content .= '<br />';
        }
        $content .= '</pre><br />';
        $content .= '<form action="/?play" method="post">';
        $content .= '<input name="point" type="text" autofocus /><br />';
        $content .= '<input type="submit" value="Fire"/>';
        $content .= '</form><br />';
        $content .= '<a href="/?show" target="_blank">Show ships</a>';
        $content .= '<br /><br /><a href="/" >New Game</a>';
        return $content;
    }

}
