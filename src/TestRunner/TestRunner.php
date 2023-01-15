<?php

namespace PhpInvariant\TestRunner;

use PhpInvariant\TestMethodRunner\TestMethodRunner;
use PhpInvariant\TestRunner\Dto\TestRunResult;
use ReflectionClass;
use ReflectionMethod;

class TestRunner
{
    public function __construct(
        private TestMethodRunner $testMethodRunner
    ) {
    }
    public function runTest(ReflectionClass $testClass): TestRunResult
    {
        $result = new TestRunResult();
        $publicMethods = $testClass->getMethods(ReflectionMethod::IS_PUBLIC);
        $testMethods = [];

        foreach ($publicMethods as $publicMethod) {
            if ($publicMethod->class === $testClass->getName() && $this->isTestMethod($publicMethod)) {
                $testMethods[] = $publicMethod;
            }
        }

        foreach ($testMethods as $testMethod) {
            $methodRunResult = $this->testMethodRunner->runTestMethod($testClass, $testMethod);
            $result->addMethodRunResult($methodRunResult);
        }
        return $result;
    }

    private function isTestMethod(ReflectionMethod $method): bool
    {
        return str_starts_with($method->getName(), 'test');
    }
}
