<?php

namespace framework;

use framework\web\exceptions\NotFoundException;
use framework\web\Routes;

class EntryPoint {
    public function run($method) {
        $app = Application::get();
        $route = Routes::resolve($app->url->path(), $method);

        if (empty($route)) {
            throw new NotFoundException();
        }

        $result = $route['route']->execute($route['params']);

        if (!empty($result)) {
            if (is_string($result)) {
                echo $result;
            }
            else {
                $result->render();
            }
        }
    }
}