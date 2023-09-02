<?php

namespace PhpInvariant\CheckMethodRunner\Condition;

use PhpInvariant\Finish\FinishCount;
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
     * @param array<mixed> $types
     * @throws ReflectionException
     */
    public function run(ReflectionClass $checkClass, ReflectionMethod $checkMethod,  FinishCount $finishCondition): MethodRunResult
    {
        $result = new MethodRunResult();
        for ($i = 0; $i < $finishCondition->getCount(); $i++) {
            $this->methodRunner->callMethod($checkClass, $checkMethod, $types, $result);
        }
        return $result;
    }
}
