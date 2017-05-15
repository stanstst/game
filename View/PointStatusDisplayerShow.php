<?php

namespace View;

use Model\Utility\PointStatus;

class PointStatusDisplayerShow
{

    public function get(PointStatus $spot)
    {
        $content = '';
        $content .= ($spot->get() === PointStatus::BLANK) ? ' . ' : '';
        $content .= ($spot->get() === PointStatus::SHIP) ? ' o ' : '';
        $content .= ($spot->get() === PointStatus::HIT) ? '   ' : '';
        $content .= ($spot->get() === PointStatus::MISS) ? '   ' : '';
        return $content;
    }

}
