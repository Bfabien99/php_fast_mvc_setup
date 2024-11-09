<?php

use App\Helpers\View;

require_once  '../vendor/autoload.php';
session_start();

define('HOME_PATH', dirname(__DIR__));
define('PUBLIC_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('RESOURCES_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', RESOURCES_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR);
Dotenv\Dotenv::createUnsafeImmutable(HOME_PATH)->load();

$router = new AltoRouter();
$router->map( 'GET', '/', function() { echo "index"; }, 'home' );

// assuming current request url = '/'
$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	// no route was matched
	http_response_code(404);
    View::render('error/404');
}