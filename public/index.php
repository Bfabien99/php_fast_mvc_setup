<?php

use App\Helpers\View;

# use autoload
require_once '../vendor/autoload.php';
# initiate session
session_start();

# define constants for folder path
define('HOME_PATH', dirname(__DIR__));
define('PUBLIC_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('RESOURCES_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', RESOURCES_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR);

# get .env configuration
Dotenv\Dotenv::createUnsafeImmutable(HOME_PATH)->load();

# instantiate altorouter
$router = new AltoRouter();

######################################
##### ROUTE DEFINITION ##############
# route '/'
$router->map('GET', '/', function () {
    echo "index.php"; # echo simple message
}, 'home');
$router->map('GET', '/index', function () {
    View::render('index'); # render a view
});
# call controller
$router->map('GET', '/home', [\App\Controllers\HomeController::class, 'index']);

######################################
###### MATCH ROUTE AND TARGET ########
# match request
$match = $router->match();

if (is_array($match)) {
    $target = $match['target'];
    $params = $match['params'];

    if (is_callable($target)) {
        # Call the function directly if the target is callable
        call_user_func_array($target, $params);
    } elseif (is_array($target) && count($target) === 2) {
        # If the target is an array, interpret the first element as the class and the second as the method
        [$class, $method] = $target;

        if (class_exists($class)) {
            $controller = new $class();
            
            if (method_exists($controller, $method)) {
                # Call the class method if it exists
                call_user_func_array([$controller, $method], $params);
            } else {
                # Error if the method is not found in the class
                http_response_code(500);
                $message = "Error : Method <strong>'{$method}'</strong> not found in <strong>'{$class}'</strong>.";
                View::render('error/500', ['message' => $message]);
            }
        } else {
            # Error if the class is not found
            http_response_code(500);
            $message = "Error : Class <strong>'{$class}'</strong> not found.";
            View::render('error/500', ['message' => $message]);
        }
    }
} else {
    # If no route matches, display a 404 error page
    http_response_code(404);
    View::render('error/404');
}