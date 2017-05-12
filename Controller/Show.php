<?php


namespace Controller;

use Exception;
use Model\GridFieldInitializer;
use View\MvcView;

class Show
{
    /**
     *
     * @var GridFieldInitializer
     */
    protected $gridField;
    /**
     *
     * @var MvcView
     */
    protected $view;
    /**
     * @var \Request\UserRequest
     */
    protected $request;

    /**
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
            $this->gridField->load();
        } catch (Exception $exception) {
            $this->view->setError($exception->getMessage());
        }
        $this->view->pushData($this->gridField->getGrid());
        $this->view->display();
    }

}