<?php

/**
 * This file initializes all other configuration
 * by including relevant files and configuring the
 * required components
 */

use framework\Application;
use framework\web\components\Config;

require_once __DIR__ . '/routes.php';

$app = Application::get();

$app->registerComponent('config', new Config());

$config = $app->config;

require_once __DIR__ . '/urls.php';
require_once __DIR__ . '/services.php';