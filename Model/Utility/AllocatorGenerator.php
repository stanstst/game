<?php

namespace Model\Utility;

use Model\SquareGrid;
use Model\Ship;

class AllocatorGenerator
{
    const HORIZONTAL_ORIENTATION = 'horizontal-orientation';
    const VERTICAL_ORIENTATION = 'vertical-orientation';

    /**
     *
     * @var HorizontalAllocator
     */
    protected $horizontalAllocator;

    /**
     *
     * @var VerticalAllocator
     */
    protected $verticalAllocator;

    /**
     *
     * @param \Model\Utility\HorizontalAllocator $horizontalAllocator
     * @param \Model\Utility\VerticalAllocator $verticalAllocator
     */
    public function __construct(
        HorizontalAllocator $horizontalAllocator, VerticalAllocator $verticalAllocator)
    {
        $this->horizontalAllocator = $horizontalAllocator;
        $this->verticalAllocator = $verticalAllocator;
    }

    public function allocate(SquareGrid $grid, Ship $ship)
    {
        $allocator = $this->getAllocator();
        $allocator->allocate($grid, $ship);
    }

    /**
     *
     * @return Allocator
     */
    protected function getAllocator()
    {
        return (rand(0, 1)) ?
            clone $this->horizontalAllocator : clone $this->verticalAllocator;
    }

}
