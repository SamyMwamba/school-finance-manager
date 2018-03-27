<?php

use Sfm\System\Router\Router;
use Sfm\Application\Application;

define('ROOT', dirname(dirname(__FILE__)));
require(ROOT."/vendor/autoload.php");
require(ROOT."/config/application.php");

$application = Application::getInstance();

try {
    $router = new Router($_GET['url'] ?? $_SERVER['REQUEST_URI'], $application);
    require(ROOT."/config/routes.php");
    $router->run();
} catch (RuntimeException $e) {
    die($e->getMessage());
} catch (InvalidArgumentException $e) {
    die($e->getMessage());
}
