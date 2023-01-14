<?php

namespace PhpInvariant\TestRunner;

use PhpInvariant\TestMethodRunner\TestMethodRunner;
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
        $testMethods = [];

        foreach ($publicMethods as $publicMethod) {
            if ($publicMethod->class === $testClass->getName() && $this->isTestMethod($publicMethod)) {
                $testMethods[] = $publicMethod;
            }
        }

        foreach ($testMethods as $testMethod) {
            $this->testMethodRunner->runTestMethod($testClass, $testMethod);
        }
    }

    private function isTestMethod(ReflectionMethod $method): bool
    {
        return str_starts_with($method->getName(), 'test');
    }
}
