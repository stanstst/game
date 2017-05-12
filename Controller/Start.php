<?php

namespace Controller;
use Exception;
use Model\GridFieldInitializer;
use View\MvcView;

class Start implements IController
{
    /**
     *
     * @var GridFieldInitializer
     */
    private $gridField;
    /**
     *
     * @var MvcView
     */
    private $view;

    /**
     *
     * @param GridFieldInitializer $field
     * @param MvcView $view
     */

    public function __construct(GridFieldInitializer $field, MvcView $view)
    {
        $this->gridField = $field;
        $this->view = $view;
    }

    public function execute()
    {
        try {
            $this->gridField->generateNew();
        } catch (Exception $exception) {
            $this->view->setError($exception->getMessage());
        }
        $this->view->pushData($this->gridField->getGrid());
        $this->view->display();
    }
}