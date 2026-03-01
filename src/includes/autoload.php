<?php

spl_autoload_register(function ($class) {
    $normalized = str_replace('\\', '/', $class);

    $path = __DIR__ . '/../' . $normalized . '.php';

    if (is_file($path)) {
        require_once $path;
    }
    else {
        throw new Exception("Unable to autoload \"$class\"");
    }
});

require_once __DIR__ . '/globals.php';
