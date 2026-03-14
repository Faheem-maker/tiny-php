<?php

namespace framework\web\models;

use framework\web\interfaces\ValidationAttribute;
use framework\web\request\Request;

class Model {
    protected static function hasProperty($name) {
        $cls = \get_called_class();
        $reflection = new \ReflectionClass($cls);
        return $reflection->hasProperty($name);
    }

    protected static function basename() {
        $cls = \get_called_class();
        $cls = explode('\\', $cls);
        return end($cls);
    }

    public static function from($data): static {
        $base = static::basename();
        if (is_array($data) && isset($data[$base])) {
            $data = $data[$base];
        }
        $cls = \get_called_class();
        $model = new $cls();
        foreach ($data as $key => $value) {
            if (self::hasProperty($key)) {
                $model->$key = $value;
            }
        }
        return $model;
    }

    public static function getMetaData() {
        $cls = \get_called_class();
        $reflection = new \ReflectionClass($cls);
        $properties = $reflection->getProperties();
        $metaData = [];
        foreach ($properties as $property) {
            $metaData[$property->getName()] = [
                'name' => $property->getName(),
                'type' => (string)$property->getType(),
                'attributes' => $property->getAttributes()
            ];
        }
        return $metaData;
    }

    /**
     * Instance Methods
     */

    public function validate() {
        $metaData = self::getMetaData();
        foreach ($metaData as $property => $data) {
            foreach ($data['attributes'] as $attribute) {
                $instance = $attribute->newInstance();
                if ($instance instanceof ValidationAttribute) {
                    $value = $this->$property;
                    if (!$instance->validate($value)) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}