<?php

use app\components\DependencyContainer;
use framework\db\ActiveModel;

$app->registerComponent('di', new DependencyContainer());

$app->di->scoped(\framework\web\request\Request::class, function () {
    return new \framework\web\request\Request();
});
$app->di->scoped(\framework\web\request\Response::class, function () {
    return new \framework\web\request\Response();
});

$app->di->setFallback(function ($name, $type, $params) {
    if ($params[$name]) {
        if (is_subclass_of($type, ActiveModel::class)) {
            return $type::find($params[$name]);
        }
    }

    return null;
});