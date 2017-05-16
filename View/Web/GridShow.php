<?php

namespace View\Web;

use View\BaseView;
use View\PointStatusDisplayerShow;

class GridShow extends BaseView
{
    /**
     * @var HtmlPage
     */
    protected $page;

    /**
     *
     * @var PointStatusDisplayerShow
     */
    protected $pointDisplayer;

    /**
     * @param HtmlPage $page
     * @param PointStatusDisplayerShow $pointDisplayer
     */
    public function __construct(HtmlPage $page, PointStatusDisplayerShow $pointDisplayer)
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
        $content = 'Show Game<br />';

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
        $content .= '</pre>';
        return $content;
    }

}
