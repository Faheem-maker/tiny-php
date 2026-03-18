<?php

namespace framework;

use framework\web\Routes;

class EntryPoint {
    public function run($method) {
        $app = Application::get();
        $route = Routes::resolve($app->url->path(), $method);

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