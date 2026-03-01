<?php

namespace framework;

/**
 * The base class for all applications.
 * It supports component binding
 * and singleton.
 * 
 * Known Components
 * @property web\components\Config $config Configuration component
 * @property web\components\PathManger $path Path manager component
 */
class Application
{
    protected static ?Application $instance = null;

    protected array $components = [];
    public string $route;

    /**
     * Private constructor to enforce singleton
     */
    private function __construct($route) {
        $this->route = $route;
    }

    public function run($method) {
        $entryPoint = new EntryPoint();

        $entryPoint->run($method);
    }

    /**
     * Get singleton instance
     */
    public static function getInstance(string $route): Application
    {
        if (static::$instance === null) {
            static::$instance = new static($route);
        }

        return static::$instance;
    }

    /**
     * Short alias for getInstance()
     */
    public static function get(): Application
    {
        return static::$instance;
    }

    /**
     * Register a component in the container
     */
    public function registerComponent(string $name, $component): void
    {
        $this->components[$name] = $component;
    }

    /**
     * Magic getter for components
     */
    public function __get(string $name)
    {
        return $this->components[$name] ?? null;
    }

    /**
     * Magic setter (optional convenience)
     */
    public function __set(string $name, $value): void
    {
        $this->registerComponent($name, $value);
    }

    /**
     * Check if component exists
     */
    public function has(string $name): bool
    {
        return array_key_exists($name, $this->components);
    }
}