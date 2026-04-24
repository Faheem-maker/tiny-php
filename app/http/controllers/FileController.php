<?php

namespace app\http\controllers;

use framework\web\exceptions\NotFoundException;

class FileController
{
    public function index(string $path)
    {
        $path = "@storage/uploads/$path";
        $absolute = app()->path->resolve($path);

        if (!file_exists($absolute) || is_dir($absolute)) {
            throw new NotFoundException("The file $path does not exist.");
        }

        return response()->file($absolute);
    }
}
