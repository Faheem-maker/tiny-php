<?php

use app\http\controllers\TextController;
use framework\web\Routes;

Routes::get('/text/analysis/counter', [TextController::class, 'counter']);