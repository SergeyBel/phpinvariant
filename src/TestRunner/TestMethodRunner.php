<?php

namespace PhpInvariant\TestRunner;

use ReflectionClass;
use ReflectionMethod;

class TestMethodRunner
{
    public function __construct(
        private ParametersCreator $parametersCreator,
    ) {
    }
    public function runTestMethod(ReflectionClass $testClass, ReflectionMethod $method)
    {
        $parameters = $method->getParameters();
        $generatedParameters = $this->parametersCreator->createParameters($parameters);
        $method->invokeArgs($testClass->newInstance(), $generatedParameters);
    }
}
