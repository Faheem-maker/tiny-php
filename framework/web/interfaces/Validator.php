<?php

namespace framework\web\interfaces;

abstract class Validator {
    protected $message = '';

    public function __construct($message = '')
    {
        if (!empty($message)) {
            $this->message = $message;
        }
    }

    public function message() {
        return $this->message;
    }

    public abstract function validate($value, $doc = null): bool;

}