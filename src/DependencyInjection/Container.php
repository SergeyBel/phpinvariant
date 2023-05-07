<?php

namespace PhpInvariant\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerInterface;
use ReflectionClass;

class Container
{
    public function __construct(private ContainerInterface $container)
    {
    }

    public function addService(string $className): void
    {
        $object = $this->createObject($className);
        $this->container->set($className, $object);
    }

    private function createObject(string $className): object
    {
        if ($this->container->has($className)) {
            return $this->container->get($className);
        }

        $reflectionClass = new ReflectionClass($className);
        $constructor = $reflectionClass->getConstructor();
        if (!$constructor || empty($constructor->getParameters())) {
            return new $className();
        }


        $parameters = [];
        foreach ($constructor->getParameters() as $parameter) {
            $parameterClass = $parameter->getType();
            $parameters[] = $this->createObject($parameterClass);
        }

        return $reflectionClass->newInstanceArgs($parameters);
    }
}
