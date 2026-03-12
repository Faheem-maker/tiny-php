<?php

define('DS', DIRECTORY_SEPARATOR);
$base_dir = realpath(dirname(__DIR__, 2));

return [
    'base_dir' => $base_dir,
    'assets' => $base_dir . DS . 'app' . DS . 'assets',
    'views' => $base_dir . DS . 'app' . DS . 'assets' . DS . 'views',
    'widgets' => $base_dir . DS . 'app' . DS . 'assets' . DS . 'widgets',
    'runtime' => $base_dir . DS . 'app' . DS . 'runtime',
];