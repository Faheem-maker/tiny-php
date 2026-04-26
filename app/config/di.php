<?php

use framework\db\ActiveModel;

app()->di->setFallback(function ($name, $type, $params) {
    if (isset($params[$name])) {
        if (is_subclass_of($type, ActiveModel::class)) {
            return $type::find($params[$name]);
        }
    } else if (is_subclass_of($type, ActiveModel::class) && request()->method() == 'POST') {
        $model = new $type();
        $model->fill(request()->post(), request()->files());
        return $model;
    }

    return null;
});