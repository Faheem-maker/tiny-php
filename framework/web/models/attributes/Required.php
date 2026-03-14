<?php

namespace framework\web\models\attributes;

use Attribute;
use framework\web\interfaces\ValidationAttribute;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD)]
class Required implements ValidationAttribute
{
    public function validate($value, $_ = null): bool
    {
        return !empty($value);
    }

}