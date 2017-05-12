<?php


namespace Utils;


class WebRouter
{
    protected $parameters = ['start'];

    public function __construct()
    {
        if ($_SERVER['QUERY_STRING']) {
            $route = current(explode("&", $_SERVER['QUERY_STRING']));
            $this->parameters = explode('-', $route);
        }
    }

    public function getController()
    {
        return $this->parameters[0];
    }

}