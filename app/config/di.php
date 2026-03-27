<?php

use framework\db\ActiveModel;

app()->di->setFallback(function ($name, $type, $params) {
    if ($params[$name]) {
        if (is_subclass_of($type, ActiveModel::class)) {
            return $type::find($params[$name]);
        }
    }

    return null;
});