<?php

namespace app\http\controllers;

class TextController {
    public function counter() {
        return response()->view('text.counter');
    }
}