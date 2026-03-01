<?php

/**
 * @var \framework\Application $app The application instance
 */

use framework\web\components\AssetManager;
use framework\web\components\PathManager;
use framework\web\components\UrlManager;
use framework\web\components\WidgetManager;

$app->registerComponent('path', new PathManager());
$app->registerComponent('url', new UrlManager());
$app->registerComponent('assets', new AssetManager());
$app->registerComponent('widgets', new WidgetManager());