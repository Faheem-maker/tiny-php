<?php

/**
 * @var \framework\Application $app The application instance
 */

use framework\web\components\AssetManager;
use framework\web\components\DependencyContainer;
use framework\web\components\ErrorHandler;
use framework\web\components\Logger;
use framework\web\components\PathManager;
use framework\web\components\Session;
use framework\web\components\UrlManager;
use framework\web\components\Validator;
use framework\web\components\WidgetManager;

$app->registerComponent('path', new PathManager());
$app->registerComponent('url', new UrlManager());
$app->registerComponent('assets', new AssetManager());
$app->registerComponent('widgets', new WidgetManager());
$app->registerComponent('di', new DependencyContainer());
$app->registerComponent('validator', new Validator());
$app->registerComponent('session', new Session());
$app->registerComponent('logger', new Logger());
$app->registerComponent('erorrs', new ErrorHandler());

/**
 * Register Dependencies
 */
$app->di->scoped(\framework\web\request\Request::class, function() {
    return new \framework\web\request\Request();
});
$app->di->scoped(\framework\web\request\Response::class, function() {
    return new \framework\web\request\Response();
});