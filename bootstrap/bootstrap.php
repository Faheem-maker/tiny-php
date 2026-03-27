<?php

use framework\Application;

$app = Application::getInstance($route, $method);

// Load all bootstrap files
require_once __DIR__ . '/di.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/components.php';
require_once __DIR__ . '/routes.php';

return $app;