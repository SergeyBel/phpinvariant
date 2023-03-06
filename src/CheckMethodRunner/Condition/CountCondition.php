<?php

namespace PhpInvariant\CheckMethodRunner\Condition;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use PhpInvariant\CheckMethodRunner\CheckMethodCaller;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class CountCondition
{
    public function __construct(
        private CheckMethodCaller $methodRunner
    ) {
    }

    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function run(ReflectionClass $checkClass, ReflectionMethod $checkMethod, array $generators, FinishCount $finishCondition): MethodRunResult
    {
        $result = new MethodRunResult();
        for ($i = 0; $i < $finishCondition->getCount(); $i++) {
            $this->methodRunner->callMethod($checkClass, $checkMethod, $generators, $result);
        }
        return $result;
    }
}
