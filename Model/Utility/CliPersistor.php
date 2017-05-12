<?php

namespace Model\Utility;

use Exception;

class CliPersistor implements Persistor
{

    const SESSION_NAME = 'app';

    /**
     *
     * @param mixed $object
     * @param string $key
     * @throws Exception
     */
    public function persist($object, $key)
    {
        if (!file_exists(__DIR__ . '/../../data/session.data')) {
            if (!mkdir(__DIR__ . '/../../data')) {
                throw new Exception('Persisting file can not be created.' . PHP_EOL);
            }
        }
        $session[$key] = $object;
        $data = serialize($session);
        file_put_contents(__DIR__ . '/../../data/session.data', $data);
    }

    /**
     *
     * @param string $key
     * @return NullGrid
     * @throws Exception
     */
    public function get($key)
    {
        if (!file_exists(__DIR__ . '/../../data/session.data')) {
            throw new Exception('Persisting file do not exist.' . PHP_EOL);
        }
        $data = file_get_contents(__DIR__ . '/../../data/session.data');
        $session = unserialize($data);
        return isset($session[$key]) ? $session[$key] : new NullGrid;
    }

}
