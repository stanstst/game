<?php

namespace Model\Utility;

interface Persistor
{
    public function persist($object, $key);

    public function get($key);
}
