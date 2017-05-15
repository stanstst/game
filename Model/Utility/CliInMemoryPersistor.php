<?php


namespace Model\Utility;


class CliInMemoryPersistor implements Persistor
{
    private static $data = [];

    public function persist($object, $key)
    {
        static::$data[$key] = $object;
    }

    public function get($key)
    {
        if (!array_key_exists($key, static::$data)){
            return null;
        }
        return static::$data[$key];
    }
}