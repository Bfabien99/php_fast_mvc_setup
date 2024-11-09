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
    if (is_callable($match['target'])) {
        # if is_callable call the function
        call_user_func_array($match['target'], $match['params']);
    } elseif (is_array($match['target']) && count($match['target']) == 2) {
        # if it's an array, try to find if it's a valid class
        [$class, $method] = $match['target'];

        if (class_exists($class, true)) {
            # if it's a valid class, try to find if method is valid
            $newClasse = new $class;
            if (method_exists($newClasse, $method)) {
                # if method is valid, call the method from the class
                call_user_func_array([$newClasse, $method], $match['params']);
            }
        }
    }
} else {
    # if no route was matched
    http_response_code(404);
    View::render('error/404');
}