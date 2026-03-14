<?php

namespace framework\web\interfaces;

interface ValidationAttribute {
    public function validate($value, $doc = null): bool;

}