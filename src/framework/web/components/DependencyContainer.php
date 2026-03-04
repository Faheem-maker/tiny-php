<?php

namespace framework\web\components;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionFunctionAbstract;
use ReflectionMethod;

class DependencyContainer {
    private array $instances = [];
    private array $definitions = [];

    /**
     * Register a singleton: The same instance is returned every time.
     */
    public function singleton(string $id, $concrete = null): void {
        $this->definitions[$id] = [
            'concrete' => $concrete ?? $id,
            'shared' => true
        ];
    }

    /**
     * Register a scoped dependency: A new instance/value is returned via factory every time.
     */
    public function scoped(string $id, $concrete = null): void {
        $this->definitions[$id] = [
            'concrete' => $concrete ?? $id,
            'shared' => false
        ];
    }

    /**
     * Resolve a dependency.
     */
    public function get(string $id, array $parameters = []) {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        $definition = $this->definitions[$id] ?? ['concrete' => $id, 'shared' => false];
        $concrete = $definition['concrete'];

        // If the concrete is a closure, treat it as a factory
        if ($concrete instanceof Closure) {
            $object = $concrete($this, ...$parameters);
        } elseif (is_string($concrete) && class_exists($concrete)) {
            $object = $this->make($concrete, $parameters);
        } else {
            // Static value
            $object = $concrete;
        }

        if ($definition['shared']) {
            $this->instances[$id] = $object;
        }

        return $object;
    }

    /**
     * Instantiate a class using reflection to auto-wire dependencies.
     */
    public function make(string $className, array $parameters = []) {
        $reflection = new ReflectionClass($className);

        if (!$reflection->isInstantiable()) {
            throw new Exception("Class {$className} is not instantiable.");
        }

        $constructor = $reflection->getConstructor();

        if (is_null($constructor)) {
            return new $className;
        }

        $dependencies = $this->resolveDependencies($constructor, $parameters);

        return $reflection->newInstanceArgs($dependencies);
    }

    /**
     * Invoke a method on an object with auto-wired dependencies.
     */
    public function invoke(object $instance, string $method, array $parameters = []) {
        $reflectionMethod = new ReflectionMethod($instance, $method);
        $dependencies = $this->resolveDependencies($reflectionMethod, $parameters);

        return $reflectionMethod->invokeArgs($instance, $dependencies);
    }

    /**
     * The heart of the container: maps parameters to types and resolves them.
     */
    private function resolveDependencies(ReflectionFunctionAbstract $method, array $parameters): array {
        $resolved = [];

        foreach ($method->getParameters() as $parameter) {
            $name = $parameter->getName();
            $type = $parameter->getType();

            // 1. Priority: Manual parameter override
            if (array_key_exists($name, $parameters)) {
                $resolved[] = $parameters[$name];
                continue;
            }

            // 2. Resolve via Class/Interface type hint
            if ($type && !$type->isBuiltin()) {
                $resolved[] = $this->get($type->getName());
                continue;
            }

            // 3. Fallback to default value if available
            if ($parameter->isDefaultValueAvailable()) {
                $resolved[] = $parameter->getDefaultValue();
                continue;
            }

            // 4. Fail if scalar with no value provided
            throw new Exception("Cannot resolve parameter '{$name}' for {$method->getName()}. No value or type-hint provided.");
        }

        return $resolved;
    }
}