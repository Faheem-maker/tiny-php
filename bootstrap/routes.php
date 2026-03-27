<?php

use app\http\middleware\Csrf;
use framework\web\Routes;

Routes::group('/', function () {
    require_once __DIR__ . '/../app/config/routes/web.php';
})->middleware(Csrf::class);