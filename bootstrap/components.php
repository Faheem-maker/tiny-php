<?php

use app\components\DependencyContainer;
use framework\Application;
use framework\components\FileSystem;
use framework\web\routing\Router;
use framework\web\components\AssetManager;
use framework\web\components\ErrorHandler;
use framework\web\components\Logger;
use framework\web\components\Session;
use framework\web\components\UrlManager;
use framework\web\components\WidgetManager;
use framework\components\PathManager;
use framework\components\Validator;

/**
 * This file attaches all core components required for the app to function.
 * 
 * @var Application $app
 */

$app->registerComponent('assets', AssetManager::class);
$app->registerComponent('container', DependencyContainer::class);
$app->registerComponent('error', new ErrorHandler());
$app->registerComponent('logger', Logger::class);
$app->registerComponent('path', PathManager::class);
$app->registerComponent('session', Session::class);
$app->registerComponent('url', UrlManager::class);
$app->registerComponent('validator', Validator::class);
$app->registerComponent('widgets', WidgetManager::class);
$app->registerComponent('router', Router::class);
$app->registerComponent('fs', FileSystem::class);