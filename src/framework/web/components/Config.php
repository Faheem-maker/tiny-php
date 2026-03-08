<?php

namespace framework\web\components;

use framework\web\interfaces\Component;

/**
 * Application configuration container
 *
 * @property string $base_dir Absolute path to root directory
 * @property string $base_url The URL of the website
 */
class Config extends Component
{
    protected array $data = [];

    public function __get(string $name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * Get config value using dot notation
     *
     * Example:
     *   $config->get('db.username');
     */
    public function get(string $key, $default = null)
    {
        $segments = explode('.', $key);
        $value = $this->data;

        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }

        return $value;
    }
}
