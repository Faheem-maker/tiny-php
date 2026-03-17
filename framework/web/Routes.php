<?php

namespace framework\web;

class Routes {
    protected static $routes = [];
    protected static $namedRoutes = [];
    protected static $prefixStack = '';
    protected static $groupStack = [];

    // Handle Grouping
    public static function group($prefix, $callback) {
        $group = new RouteGroup($prefix);
        if (!empty(static::$groupStack)) {
            end(static::$groupStack)?->add($group);
        }
        $previousGroupStack = static::$prefixStack;
        static::$prefixStack .= $prefix;
        self::$groupStack[] = $group;
        $callback();
        static::$prefixStack = $previousGroupStack; // Reset after callback
        array_pop(self::$groupStack);

        return $group;
    }

    public static function route($route, $action, $method, $name = null) {
        $fullPath = static::$prefixStack . $route;
        $fullPath = app()->url->normalize($fullPath);
        
        // Convert {id} to a named regex group (?P<id>[^/]++)
        $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '(?P<$1>[^/]++)', $fullPath);
        $pattern = "#^" . $pattern . "$#";

        $routeObject = new Route($action[0], $action[1], $fullPath);
        static::$routes[$method][$pattern] = $routeObject;

        if (!empty($name)) {
            static::$namedRoutes[$name] = static::$routes[$method][$pattern];
        }
        if (!empty(self::$groupStack)) {
            end(self::$groupStack)->add($routeObject);
        }
        
        return $routeObject; // Return object to allow chaining ->name()
    }

    public static function get($route, $action, $name = null) {
        return static::route($route, $action, 'GET', $name);
    }

    public static function post($route, $action, $name = null) {
        return static::route($route, $action, 'POST', $name);
    }

    public static function patch($route, $action, $name = null) {
        return static::route($route, $action, 'PATCH', $name);
    }

    public static function put($route, $action, $name = null) {
        return static::route($route, $action, 'PUT', $name);
    }

    public static function delete($route, $action, $name = null) {
        return static::route($route, $action, 'DELETE', $name);
    }

    public static function resolve($uri, $method) {
        foreach (static::$routes[$method] as $pattern => $route) {
            if (preg_match($pattern, $uri, $matches)) {
                // Filter out non-string keys from preg_match to get clean params
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return ['route' => $route, 'params' => $params];
            }
        }
        return null; // 404
    }

    public static function resolveName($name, $params = []) {
        return static::$namedRoutes[$name];
    }

    public static function resource($prefix, $controller, $config = []) {
        $resource = $config['resource'] ?? $prefix;

        $routes = [
            'index' => ['GET', '/'],
            'create' => ['GET', '/create'],
            'store' => ['POST', '/'],
            'show' => ['GET', "/{{$resource}}"],
            'edit' => ['GET', '/{' . $resource . '}/edit'],
            'update' => ['PUT', "/{{$resource}}"],
            'update' => ['PATCH', "/{{$resource}}"],
            'destroy' => ['DELETE', "/{{$resource}}"],
        ];
        
        if (isset($config['only'])) {
            $routes = array_map(function ($route) use ($routes) { return $routes[$route]; }, $config['only']);
        }
        else if (isset($config['except'])) {
            foreach ($config['except'] as $except) {
                unset($routes[$except]);
            }
        }

        return Routes::group($prefix, function () use ($routes, $controller) {
            foreach ($routes as $action => $route) {
                $method = $route[0];
                Routes::$method($route[1], [$controller, $action], $action);
            }
        })->name($resource);
    }

    public static function rename($from, $to) {
        static::$namedRoutes[$to] = static::$namedRoutes[$from];
        unset(static::$namedRoutes);
    }
}