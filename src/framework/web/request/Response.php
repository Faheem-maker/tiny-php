<?php

namespace framework\web\request;

use framework\web\response\ViewResponse;

class Response {
    public function send($content) {
        echo $content;
    }

    public function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }

    public function view($template, $data = []) {
        return new ViewResponse($template, $data);
    }
}