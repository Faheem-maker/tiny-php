<?php

namespace framework\web;

class Routes {
    protected static $routes = [];

    public static function route($route, $action, $method) {
        if (empty($routes[$route])) {
            $routes[$route] = [];
        }
        static::$routes[$route][$method] = $action;
    }

    public static function get($route, $action) {
        static::route($route, $action, 'GET');
    }

    public static function post($route, $action) {
        static::route($route, $action, 'POST');
    }

    public static function resolve($route, $method) {
        return static::$routes[$route][$method];
    }
}