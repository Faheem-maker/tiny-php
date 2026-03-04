<?php

namespace framework\web\request;

/**
 * Request Class
 * 
 * This class provides several helper
 * methods and utilities over the raw
 * $_GET, $_POST, $_FILES, etc. superglobals.
 */
class Request {
    public function get(string $key, $default = null) {
        return $_GET[$key] ?? $default;
    }

    public function post(string $key, $default = null) {
        return $_POST[$key] ?? $default;
    }

    public function method() {
        return $_GET['__method'] ?? $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
}