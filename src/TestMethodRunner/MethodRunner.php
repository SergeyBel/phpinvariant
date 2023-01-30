<?php

namespace PhpInvariant\TestMethodRunner;

use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class MethodRunner
{
    public function __construct(
        private MethodCaller $methodCaller
    ) {
    }

    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function runMethod(ReflectionClass $testClass, ReflectionMethod $testMethod, array $generators, MethodRunResult $result): void
    {
        try {
            $this->methodCaller->callMethod($testClass, $testMethod, $generators);
        } catch (ExpectationFailedException $exception) {
            $result->addErrorRun($testClass->getName(), $testMethod->getName(), $exception->getMessage(), $exception->getTraceAsString());
        } finally {
            $result->incrementRunCount();
        }
    }
}
