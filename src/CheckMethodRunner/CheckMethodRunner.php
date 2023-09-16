<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\CheckMethodRunner\Condition\ConditionRunner;
use PhpInvariant\MethodParser\CheckMethodParser;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use ReflectionMethod;

class CheckMethodRunner
{
    public function __construct(
        private CheckMethodParser $methodParser,
        private ConditionRunner $conditionRunner
    ) {
    }
    public function runCheckMethod(BaseInvariant $invariantClass, ReflectionMethod $checkMethod): MethodRunResult
    {
        $finishCondition = $this->methodParser->getFinishCondition($checkMethod);
        return $this->conditionRunner->runCondition($invariantClass, $checkMethod, $finishCondition);

    }
}
