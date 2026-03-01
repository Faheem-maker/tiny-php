<?php

/**
 * This file defines important directories and URLs
 * required for the application to function correctly.
 * 
 * @var framework\web\components\Config $config Auto-injected config instance
 */

/**
 * Define the base URL if your site
 * is hosted in a subfolder
 */
$config->base_url = '/tiny-tools';

/**
 * This can be auto-inferred in most cases
 */
$config->base_dir = realpath(dirname(__DIR__, 2));

define('DS', DIRECTORY_SEPARATOR);

/**
 * Important directories within application
 * 
 * This should be modified if you want to
 * modify your folder structure
 */
$config->dirs = [
    'assets' => $config->base_dir . DS . 'app' . DS . 'assets',
    'views' => $config->base_dir . DS . 'app' . DS . 'assets' . DS . 'views',
    'widgets' => $config->base_dir . DS . 'app' . DS . 'assets' . DS . 'widgets',
    'runtime' => $config->base_dir . DS . 'app' . DS . 'runtime',
];