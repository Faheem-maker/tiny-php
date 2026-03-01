<?php

use framework\web\response\ViewResponse;

function view($path, $params = []) {
    return new ViewResponse($path, $params);
}