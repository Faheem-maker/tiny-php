<?php

use framework\Application;
use framework\web\request\Response;

function app() {
    return Application::get();
}

function response() {
    return new Response();
}

function request() {
    return app()->di->get(\framework\web\request\Request::class);
}

function view() {
    return response()->view(...func_get_args());
}