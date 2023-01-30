<?php

namespace PhpInvariant\TestMethodRunner;

use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class TestMethodCaller
{
    public function __construct(
        private TestMethodGeneratorsCaller $methodCaller
    ) {
    }

    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function callMethod(ReflectionClass $testClass, ReflectionMethod $testMethod, array $generators, MethodRunResult $result): void
    {
        $callResult = $this->methodCaller->callMethod($testClass, $testMethod, $generators);
        $result->setErrorRuns($callResult->getErrorRuns());
        $result->incrementRunCount();
    }
}
