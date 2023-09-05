<?php

namespace PhpInvariant\CheckMethodRunner\Condition;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishTime;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use PhpInvariant\CheckMethodRunner\CheckMethodCaller;
use ReflectionException;
use ReflectionMethod;

class TimeCondition
{
    public function __construct(
        private CheckMethodCaller $methodRunner
    ) {
    }


    /**
     * @throws ReflectionException
     */
    public function run(BaseInvariant $checkClass, ReflectionMethod $checkMethod, FinishTime $finishCondition): MethodRunResult
    {
        $result = new MethodRunResult();
        $start = time();
        while (time() - $start < $finishCondition->getSecondsDelay()) {
            $this->methodRunner->callMethod($checkClass, $checkMethod, $result);
        }
        return $result;
    }
}
