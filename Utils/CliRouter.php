<?php

namespace Utils;


class CliRouter
{
    protected $parameters = array('', '');
    public function __construct()
    {
        global $argv;

        $this->parameters = $argv;

        if (count($this->parameters) < 2) {
            print '************* Qwick Instructions ***************' . PHP_EOL . PHP_EOL;

            print 'Start new game ex: php index.php start' . PHP_EOL;
            print 'Play game ex: php index.php play A1' . PHP_EOL;
            print 'Show field ex: php index.php show' . PHP_EOL . PHP_EOL;
            print '************* Qwick Instructions ***************' . PHP_EOL . PHP_EOL;
            throw new \Exception('Missing arguments ' . PHP_EOL);
        }
    }
    public function getController()
    {
        return $this->parameters[1];
    }
}