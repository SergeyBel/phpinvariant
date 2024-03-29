<?php

namespace PhpInvariant\CheckMethodRunner\Condition;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use PhpInvariant\CheckMethodRunner\CheckMethodCaller;
use ReflectionException;
use ReflectionMethod;

class CountCondition
{
    public function __construct(
        private CheckMethodCaller $methodRunner
    ) {
    }

    /**
     * @throws ReflectionException
     */
    public function run(BaseInvariant $checkClass, ReflectionMethod $checkMethod, FinishRuns $finishCondition): MethodRunResult
    {
        $result = new MethodRunResult();
        for ($i = 0; $i < $finishCondition->getRuns(); $i++) {
            $this->methodRunner->callMethod($checkClass, $checkMethod, $result);
        }
        return $result;
    }
}
