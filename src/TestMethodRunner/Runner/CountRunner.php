<?php

namespace PhpInvariant\TestMethodRunner\Runner;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use PhpInvariant\TestMethodRunner\MethodCaller;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class CountRunner
{
    public function __construct(
        private MethodCaller $methodCaller
    ) {
    }

    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function run(ReflectionClass $testClass, ReflectionMethod $testMethod, array $generators, FinishCount $finishCondition): MethodRunResult
    {
        $result = new MethodRunResult();
        for ($i = 0; $i < $finishCondition->getCount(); $i++) {
            try {
                $this->methodCaller->callMethod($testClass, $testMethod, $generators);
            } catch (ExpectationFailedException $exception) {
                $result->addErrorRun($testClass->getName(), $testMethod->getName(), $exception->getMessage(), $exception->getTraceAsString());
            } finally {
                $result->incrementRunCount();
            }
        }
        return $result;
    }
}
