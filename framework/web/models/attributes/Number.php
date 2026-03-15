<?php

namespace framework\web\models\attributes;

use Attribute;
use framework\web\interfaces\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD)]
class Number extends Validator
{
    public $message = 'This must be a valid number';

    public function validate($value, $_ = null): bool
    {
        return is_numeric($value);
    }

}