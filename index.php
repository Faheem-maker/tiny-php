<?php

require_once __DIR__ . '/includes/autoload.php';

use framework\Application;

$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = '/' . trim($route, '/');

$app = Application::getInstance($route);

require_once __DIR__ . '/app/config/bootstrap.php';

$app->run($_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD']);