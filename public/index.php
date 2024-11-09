<?php
require_once  '../vendor/autoload.php';

session_start();

define('HOME_PATH', dirname(__DIR__));
define('PUBLIC_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', HOME_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR);