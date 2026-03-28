<?php

define('DS', DIRECTORY_SEPARATOR);
$base_dir = realpath(dirname(__DIR__, 2));

return [
    'base_dir' => $base_dir,
    'app' => $base_dir . DS . 'app',
    'assets' => $base_dir . DS . 'app' . DS . 'resources',
    'views' => $base_dir . DS . 'app' . DS . 'resources' . DS . 'views',
    'widgets' => $base_dir . DS . 'app' . DS . 'resources' . DS . 'widgets',
    'runtime' => $base_dir . DS . 'app' . DS . 'runtime',
];