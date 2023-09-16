<?php

namespace PhpInvariant\CheckMethodRunner;

use ReflectionClass;
use ReflectionMethod;

class CheckMethodFinder
{
    public const METHOD_MASK = 'check';

    /**
     * @return ReflectionMethod[]
     */
    public function getCheckMethods(ReflectionClass $invariantClass): array
    {
        $publicMethods = $invariantClass->getMethods(ReflectionMethod::IS_PUBLIC);
        $checkMethods = [];

        foreach ($publicMethods as $publicMethod) {
            if ($publicMethod->class === $invariantClass->getName() && $this->isCheckMethod($publicMethod)) {
                $checkMethods[] = $publicMethod;
            }
        }

        return $checkMethods;

    }

    private function isCheckMethod(ReflectionMethod $method): bool
    {
        return str_starts_with($method->getName(), self::METHOD_MASK);
    }

}
