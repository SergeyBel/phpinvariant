<?php

namespace PhpInvariant\CheckMethodRunner\Condition;

use PhpInvariant\Finish\FinishTime;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use PhpInvariant\CheckMethodRunner\CheckMethodCaller;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class TimeCondition
{
    public function __construct(
        private CheckMethodCaller $methodRunner
    ) {
    }


    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function run(ReflectionClass $checkClass, ReflectionMethod $checkMethod, array $generators, FinishTime $finishCondition): MethodRunResult
    {
        $result = new MethodRunResult();
        $start = time();
        while (time() - $start < $finishCondition->getSecondsDelay()) {
            $this->methodRunner->callMethod($checkClass, $checkMethod, $generators, $result);
        }
        return $result;
    }
}
