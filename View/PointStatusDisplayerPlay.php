<?php

namespace View;

use Model\Utility\PointStatus;

class PointStatusDisplayerPlay
{

    public function get(PointStatus $spot)
    {
        $content = '';
        $content .= ($spot->get() === PointStatus::BLANK) ? ' . ' : '';
        $content .= ($spot->get() === PointStatus::SHIP) ? ' . ' : '';
        $content .= ($spot->get() === PointStatus::HIT) ? ' x ' : '';
        $content .= ($spot->get() === PointStatus::MISS) ? ' - ' : '';
        return $content;
    }

}
