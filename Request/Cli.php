<?php

namespace Request;

class Cli implements UserRequest
{

    public function __construct()
    {

    }

    public function getByKey($key)
    {
        global $userInput;
        return $userInput;
    }

}
