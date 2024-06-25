<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base directory
define('BASE_DIR', dirname(__DIR__));

// Autoload core classes
spl_autoload_register(function ($class) {
    $base_dir = BASE_DIR . '/app/';

    // Replace the namespace separator with the directory separator
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

require_once '../app/core/Router.php';
require_once '../app/core/Controller.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/UserController.php';

$router = new Router();

$router->add('/', function() {
    $controller = new HomeController();
    $controller->index();
});

$router->add('/my_photos', function() {
    $controller = new UserController();
    $controller->index();
});

$router->add('/login', function() {
    $controller = new UserController();
    $controller->login();
});

$router->add('/register', function() {
    $controller = new UserController();
    $controller->register();
});

$router->add('/logout', function() {
    $controller = new UserController();
    $controller->logout();
});


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($uri);
