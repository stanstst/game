<?php

namespace Request;

class Cli implements UserRequest
{

    public function __construct()
    {

    }

    public function getByKey($key)
    {
        global $argv;
        return isset($argv[2]) ? $argv[2] : null;
    }

}
