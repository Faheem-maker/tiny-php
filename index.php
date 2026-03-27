<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/autoload.php';

$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = '/' . trim($route, '/');

$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$app = require_once __DIR__ . '/bootstrap/bootstrap.php';

$app->init();

$app->run();