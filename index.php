<?php
define('PROJECT_ROOT_DIR', __DIR__);

require_once PROJECT_ROOT_DIR . DIRECTORY_SEPARATOR . 'bootstrap.php';




try {
    if (PHP_SAPI === 'cli') {
        $router = new Utils\CliRouter();
        $factoryClass = 'Factory\\' . ucfirst($router->getController()). 'Cli';
    } else {

    }







/* @var $controller \Controller\IController*/
    $controller = $factoryClass::instance()->create();
    $controller->execute();




//    $controller->$actionName();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

