<?php


namespace Factory;


use Controller\Show;

class ShowCli extends BaseFactory
{

    public function create()
    {
       $controller = new Show();
    }
}