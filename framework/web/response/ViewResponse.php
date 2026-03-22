<?php

namespace framework\web\response;

use framework\Application;
use framework\utils\ViewCompiler;

class ViewResponse extends HttpResponse {
    protected $path;
    protected $data;

    public function __construct($path, $params)
    {
        $this->path = $path;
        $this->data = $params;
    }

    public function render() {
        $path = Application::get()->path;
        
        if (str_starts_with($this->path, '@')) {
            $base = explode('.', $this->path);
            $dir = $path->resolve(substr($base[0] . '/', 0));
            $this->path = substr($this->path, strlen($base[0]) + 1);
        }
        else {
            $dir = $path->resolve('@views/');
        }

        $compiler = new ViewCompiler(
            $dir,
            $path->resolve('@runtime/views')
            );

        $compiler->render($this->path, $this->data);
    }

    public function with($key, $value) {
        $this->data[$key] = $value;

        return $this;
    }
}