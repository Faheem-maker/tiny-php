<?php

namespace framework\web\models;

use framework\web\interfaces\Validator;

class Model {
    public $errors = [];

    protected static function hasProperty($name) {
        $cls = \get_called_class();
        $reflection = new \ReflectionClass($cls);
        return $reflection->hasProperty($name);
    }

    public static function basename() {
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
    public function rules() {
        return [];
    }

    public function validate() {
        $metaData = self::getMetaData();
        $valid = true;
        $rules = self::rules();

        foreach ($metaData as $property => $data) {
            foreach ($data['attributes'] as $attribute) {
                $instance = $attribute->newInstance();
                $rules[$property][] = $instance;
            }
        }

        $this->errors = app()->validator->validate($this, $rules);
        return empty($this->errors);
    }

    public function errors($name = '') {
        if ($name) {
            return $this->errors[$name] ?? '';
        }
        return $this->errors;
    }

    public static function label($property) {
        $metaData = self::getMetaData();
        if (isset($metaData[$property])) {
            foreach ($metaData[$property]['attributes'] as $attribute) {
                $instance = $attribute->newInstance();
                if (method_exists($instance, 'label')) {
                    return $instance->label();
                }
            }
        }
        return ucfirst($property);
    }
}