<?php

use framework\db\ActiveModel;
use framework\web\request\Request;
use framework\web\request\Response;

app()->di->scoped(Request::class, new Request());
app()->di->scoped(Response::class, new Response());

app()->di->setFallback(function ($name, $type, $params) {
    if ($params[$name]) {
        if (is_subclass_of($type, ActiveModel::class)) {
            return $type::find($params[$name]);
        }
    }

    return null;
});