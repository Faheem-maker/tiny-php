<?php

/**
 * This file initializes all other configuration
 * by including relevant files and configuring the
 * required components
 */

use framework\web\components\Config;
use framework\utils\helpers\DirectoryHelper;
use framework\utils\helpers\DotenvHelper;
use framework\web\Routes;

session_start();

// Load dotenv
DotenvHelper::load(__DIR__ . '/../../.env');

app()->registerComponent('config', new Config());

foreach (DirectoryHelper::listFiles(__DIR__, 'bootstrap.php') as $file) {
    $res = require_once __DIR__ . '/' . $file;
    if (!empty($res)) {
        app()->config->set(pathinfo($file, PATHINFO_FILENAME), $res);
    }
}

// Load routes
Routes::group('/', function () {
    require_once __DIR__ . DS . 'routes' . DS . 'web.php';
})->middleware(\app\http\middleware\Csrf::class);