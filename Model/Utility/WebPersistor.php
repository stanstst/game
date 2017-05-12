<?php

namespace Model\Utility;

session_start();

class WebPersistor implements Persistor
{

    const SESSION_NAME = 'app';

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->session = &$_SESSION;
    }

    /**
     * @param mixed $object
     * @param string $key
     */
    public function persist($object, $key)
    {
        $this->session[self::SESSION_NAME][$key] = $object;
    }

    /**
     * @param string $key
     * @return NullGrid
     */
    public function get($key)
    {
        return isset($this->session[self::SESSION_NAME][$key]) ?
            $this->session[self::SESSION_NAME][$key] : new NullGrid;
    }

}
