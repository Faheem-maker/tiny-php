<?php

use framework\Application;
use framework\web\request\Response;

function app()
{
    return Application::get();
}

function response()
{
    return new Response();
}

function request()
{
    return app()->di->get(\framework\web\request\Request::class);
}

function view()
{
    $args = func_get_args();
    if (empty($args)) {
        // Find the controller/view automatically
        $trace = debug_backtrace();
        $cls = explode('\\', $trace[1]['class']);
        $cls = end($cls);
        $cls = strtolower(str_replace('Controller', '', $cls));
        $method = $trace[1]['function'];

        $args[0] = "$cls.$method";
    }
    return response()->view(...$args);
}

/**
 * @return framework\db\QueryBuilder|null
 */
function db()
{
    return app()->db;
}

function config($key = null, $default = null)
{
    if ($key === null) {
        return app()->config;
    }

    return app()->config->get($key, $default);
}

function env($key, $default = null)
{
    if ($key === null) {
        return $_ENV;
    }
    return $_ENV[$key] ?? $default;
}

function logs() {
    return app()->logger;
}

function session() {
    return app()->session;
}