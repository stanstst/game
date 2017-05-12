<?php
define('PROJECT_ROOT_DIR', __DIR__);

// Ensure basic class auto-loading
require_once __DIR__ . DIRECTORY_SEPARATOR. 'Utils/Autoader.php';
spl_autoload_register(__NAMESPACE__ .'\Utils\Autoader::load');

// Running app
try {
    // Decision whether CLI or Web environment
    $environment = PHP_SAPI;
    if ($environment === 'cli') {
        $router = new Utils\CliRouter();
        $factoryClass = 'Factory\\' . ucfirst($router->getController()) . 'Cli';
    } else {
        $router = new Utils\WebRouter();
        $factoryClass = 'Factory\\' . ucfirst($router->getController()) . 'Web';

    }

    /* @var $controller \Controller\IController */
    $controller = $factoryClass::instance($environment)->create();
    $controller->execute();

} catch (Exception $exception) {
    echo $exception->getMessage();
}

