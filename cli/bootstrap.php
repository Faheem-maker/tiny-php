<?php

use framework\console\ConsoleApplication;

$app = ConsoleApplication::getInstance($argv);

// Load all bootstrap files
require_once __DIR__ . '/di.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/components.php';

return $app;