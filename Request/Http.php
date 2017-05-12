<?php

namespace Request;

class Http implements UserRequest
{

    public function __construct()
    {

    }

    public function getPost($key)
    {
        return (string)filter_input(INPUT_GET, $key);
    }

    public function getGet($key)
    {
        return (string)filter_input(INPUT_POST, $key);
    }

    public function getByKey($key)
    {
        return $this->getPost($key) ?
            $this->getPost($key) : $this->getGet($key);
    }

}
