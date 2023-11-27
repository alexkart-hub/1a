<?php
namespace Core\Main;

use Core\Main\Container\DependencyRepository;
use Core\Main\Traits\Singleton;

class Container
{
    use Singleton;

    private DependencyRepository $dependencyRepository;
    private mixed $element;
    private mixed $arguments = null;

    private function __construct()
    {
        $this->dependencyRepository = DependencyRepository::getInstance();
    }
    
    public function get($element)
    {
        if (is_null($element)) {
            return false;
        }

        if ($this->has($element)) {
            return $this->dependencyRepository->get($element);
        }

        try {
            $reflectionClass = new \ReflectionClass($element);
        } catch (\ReflectionException $e) {
            return false;
        }

        $constructor = $reflectionClass->getConstructor();

        if (is_null($constructor)) {
            return $reflectionClass->newInstance();
        }

        if (!is_null($this->arguments)) {
            $arguments = is_array($this->arguments) ? $this->arguments : [$this->arguments];
            return $reflectionClass->newInstanceArgs($arguments);
        }

        $arguments = $constructor->getParameters();
        $params = [];
        foreach ($arguments as $argument) {
            if ($argument->isDefaultValueAvailable()) {
                $params[] = $argument->getDefaultValue();
                continue;
            }

            $argumentName = $argument->getName();
            $argumentType = $argument->getType();

            if (!$argumentType?->isBuiltin()) {
                $class = $argumentType?->getName();
                $params[] = $this->get($class);
                continue;
            }

            if ($this->has($argumentName)) {
                $params[] = $this->get($argumentName);
                continue;
            }

            $params[] = match($argumentType->getName()) {
                "array" => [],
                "string" => "",
                "int" => 0,
                "bool" => false,
                "float" => 0.0,
                default => throw new \Exception('Unexpected match value')
            };
        }
        if ($constructor->isPrivate() || $constructor->isProtected()) {
            return $reflectionClass->newInstanceWithoutConstructor()::getInstance();
        }
        return $reflectionClass->newInstanceArgs($params);
    }

    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
        return $this;
    }

    private function has($element): bool
    {
        return array_key_exists($element, $this->dependencyRepository->getAll());
    }

    private function __clone() {}
}