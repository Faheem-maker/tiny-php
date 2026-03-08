<?php

/**
 * This file initializes all other configuration
 * by including relevant files and configuring the
 * required components
 */

use framework\Application;
use framework\web\components\Config;
use framework\utils\helpers\DirectoryHelper;

require_once __DIR__ . '/routes.php';

$app = Application::get();

$app->registerComponent('config', new Config());

$config = $app->config;

foreach (DirectoryHelper::listFiles(__DIR__, 'bootstrap.php') as $file) {
    require_once __DIR__ . '/' . $file;
    $config->set(pathinfo($file, PATHINFO_FILENAME), require_once __DIR__ . '/' . $file);
}