<?php

namespace PhpInvariant\TestMethodRunner\Condition;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use PhpInvariant\TestMethodRunner\TestMethodCaller;
use PhpInvariant\TestMethodRunner\TestMethodRunner;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class CountCondition
{
    public function __construct(
        private TestMethodCaller $methodRunner
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
            $this->methodRunner->callMethod($testClass, $testMethod, $generators, $result);
        }
        return $result;
    }
}
