<?php

namespace framework;

use framework\web\Routes;

class EntryPoint {
    public function run($method) {
        $app = Application::get();
        $action = Routes::resolve($app->url->path(), $method);

        $controller = $action[0];
        $method = $action[1];

        // Initialize the controller
        $obj = new $controller();

        $result = $obj->$method();

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