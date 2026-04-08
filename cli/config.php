<?php

use framework\Application;

/**
 * Thie file bootstraps the config container and load all
 * configuration files automatically
 * 
 * @var Application $app
 */
use framework\components\Config;
use framework\utils\helpers\DirectoryHelper;
use framework\utils\helpers\DotenvHelper;

// Load dotenv
if (file_exists(__DIR__ . '/../.env')) {
    DotenvHelper::load(__DIR__ . '/../.env');
}

$app->registerComponent('config', new Config());

foreach (DirectoryHelper::listFiles(__DIR__ . '/../app/config', 'web.php') as $file) {
    $res = require_once __DIR__ . '/../app/config/' . $file;
    if (!empty($res)) {
        $app->config->set(pathinfo($file, PATHINFO_FILENAME), $res);
    }
}