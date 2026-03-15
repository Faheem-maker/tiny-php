<?php

namespace framework\web\models\attributes;

use Attribute;
use framework\web\interfaces\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD)]
class Required extends Validator
{
    public $message = 'This field is required';

    public function validate($value, $_ = null): bool
    {
        return !empty($value);
    }

}