<?php

namespace framework\web;

class Route {
    protected $middlewares = []; // Renamed to plural for clarity

    public function __construct(
        public string $controller,
        public string $action
    ){}

    public function middleware($middleware) {
        // Support both single strings and arrays
        if (is_array($middleware)) {
            $this->middlewares = array_merge($this->middlewares, $middleware);
        } else {
            $this->middlewares[] = $middleware;
        }
        return $this; // Return $this for chaining
    }

    public function execute(array $params) {
        // This is the final destination: the actual controller logic
        $coreAction = function() use ($params) {
            $controller = app()->di->make($this->controller);
            return app()->di->invoke($controller, $this->action, $params);
        };

        // If no middleware, just run the core
        if (empty($this->middlewares)) {
            return $coreAction();
        }

        // Wrap the core action in the middleware layers (running in reverse)
        $pipeline = array_reduce(
            array_reverse($this->middlewares), 
            function ($next, $middleware) {
                return function () use ($next, $middleware) {
                    // We resolve the middleware class and call its 'handle' method
                    $instance = app()->di->make($middleware);
                    return app()->di->invoke($instance, 'handle', [
                        'next' => $next,
                    ]);
                };
            }, 
            $coreAction
        );

        return $pipeline();
    }
}