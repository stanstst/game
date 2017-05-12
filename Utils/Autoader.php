<?php

namespace Utils;


class Autoader
{
    static public function load($className)
    {
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        require_once PROJECT_ROOT_DIR . DIRECTORY_SEPARATOR .$classPath;
//        require_once '/home/stan/battle/Utils/CliRouter.php';
    }
}