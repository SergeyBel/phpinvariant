<?php

namespace PhpInvariant\TestMethodRunner\Runner;

use PhpInvariant\Finish\FinishTime;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class TimeRunner
{
    public function __construct(
        private MethodRunner $methodRunner
    ) {
    }


    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function run(ReflectionClass $testClass, ReflectionMethod $testMethod, array $generators, FinishTime $finishCondition): MethodRunResult
    {
        $result = new MethodRunResult();
        $start = time();
        while (time() - $start < $finishCondition->getSecondsDelay()) {
            $this->methodRunner->runMethod($testClass, $testMethod, $generators, $result);
        }
        return $result;
    }
}
