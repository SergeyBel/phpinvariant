<?php

namespace PhpInvariant\TestRunner;

use ReflectionClass;
use ReflectionMethod;

class TestRunner
{
    public function __construct(
        private TestMethodRunner $testMethodRunner
    ) {
    }
    public function runTest(ReflectionClass $testClass): void
    {
        $publicMethods = $testClass->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($publicMethods as $publicMethod) {
            if ($publicMethod->class === $testClass->getName() && $this->isTestMethod($publicMethod)) {
                $this->testMethodRunner->runTestMethod($testClass, $publicMethod);
            }
        }
    }

    private function isTestMethod(ReflectionMethod $method)
    {
        return str_starts_with($method->getName(), 'test');
    }
}
