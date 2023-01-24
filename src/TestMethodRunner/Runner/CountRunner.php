<?php

namespace PhpInvariant\TestMethodRunner\Runner;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class CountRunner
{
    public function __construct(
        private MethodRunner $methodRunner
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
            $this->methodRunner->runMethod($testClass, $testMethod, $generators, $result);
        }
        return $result;
    }
}
