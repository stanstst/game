<?php

if (!defined('PROJECT_ROOT_DIR')) {
    define('PROJECT_ROOT_DIR', __DIR__);
    // Ensure basic class auto-loading
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'Utils/Autoader.php';
    spl_autoload_register(__NAMESPACE__ . '\Utils\Autoader::load');
}

// Running app
try {
    $config = include PROJECT_ROOT_DIR . DIRECTORY_SEPARATOR . 'config.php';
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
    $controller = $factoryClass::instance($environment, $config)->create();
    $controller->execute();

} catch (Exception $exception) {
    echo $exception->getMessage() . ($environment === 'cli' ? PHP_EOL : '');
}

