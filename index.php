<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

define('BASE_URL', 'http://10.0.0.55/colarinhobranco/index.php');
define('BASE_ASSETS', 'view/assets');
define('BASE_INCLUDES', 'view/includes');


use App\FrontController\FrontController;

$frontController = new FrontController();
$frontController->execute();