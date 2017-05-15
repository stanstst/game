<?php

namespace Utils;


class CliRouter
{
    protected $parameters = array('', '');
    public function __construct()
    {
        global $cliController;

        $this->parameters[0] = $cliController;

        if ($this->parameters[0] === 'start') {
            $this->helpContinuously();
        }
    }
    public function getController()
    {
        return $this->parameters[0];
    }

    protected function helpContinuously()
    {
        print '************* Qwick Instructions ***************' . PHP_EOL . PHP_EOL;

        print 'Pay game, enter coordinates: a1' . PHP_EOL;
        print 'Stop game, enter: q' . PHP_EOL;
        print 'Show ships enter: show' . PHP_EOL . PHP_EOL;
        print '****************************' . PHP_EOL . PHP_EOL;
    }
    protected function help()
    {
        print '************* Qwick Instructions ***************' . PHP_EOL . PHP_EOL;

        print 'Start new game ex: php index.php start' . PHP_EOL;
        print 'Play game ex: php index.php play A1' . PHP_EOL;
        print 'Show field ex: php index.php show' . PHP_EOL . PHP_EOL;
        print '************* Qwick Instructions ***************' . PHP_EOL . PHP_EOL;
    }
}