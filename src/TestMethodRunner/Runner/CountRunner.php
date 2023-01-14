<?php

namespace PhpInvariant\TestMethodRunner\Runner;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\TestMethodRunner\MethodCaller;
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
     * @return void
     * @throws ReflectionException
     */
    public function run(ReflectionClass $testClass, ReflectionMethod $testMethod, array $generators, FinishCount $finishCondition)
    {
        for ($i = 0; $i < $finishCondition->getCount(); $i++) {
            $this->methodCaller->callMethod($testClass, $testMethod, $generators);
        }
    }
}
