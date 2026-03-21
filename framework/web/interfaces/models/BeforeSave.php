<?php

namespace framework\web\interfaces\models;

interface BeforeSave {
    public function beforeSave(&$value, $model);
}