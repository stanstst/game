<?php

namespace Controller;

use Exception;
use Model\GridFieldHitter;
use Request\UserRequest;
use View\MvcView;

class Play
{
    /**
     *
     * @var GridFieldHitter
     */
    protected $gridField;
    /**
     *
     * @var MvcView
     */
    protected $view;
    /**
     * @var UserRequest
     */
    protected $request;
    /**
     *
     * @param GridFieldHitter $field
     * @param MvcView $view
     * @param UserRequest $request
     */
    public function __construct(GridFieldHitter $field, MvcView $view, UserRequest $request)
    {
        $this->gridField = $field;
        $this->view = $view;
        $this->request = $request;
    }
    public function execute()
    {
        try {
            $hitPoint = $this->request->getByKey('point');
            $this->gridField->play($hitPoint);
        } catch (Exception $exception) {
            $this->view->setError($exception->getMessage());
        }
        $this->view->pushData($this->gridField->getGrid());
        $this->view->display();
    }

}