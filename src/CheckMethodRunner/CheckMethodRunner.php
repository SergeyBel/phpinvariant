<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Finish\FinishTime;
use PhpInvariant\MethodParser\CheckMethodParser;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use PhpInvariant\CheckMethodRunner\Condition\CountCondition;
use PhpInvariant\CheckMethodRunner\Condition\TimeCondition;
use ReflectionClass;
use ReflectionMethod;
use Exception;

class CheckMethodRunner
{
    public function __construct(
        private CheckMethodParser $methodParser,
        private CountCondition $countRunner,
        private TimeCondition $timeRunner
    ) {
    }
    public function runCheckMethod(ReflectionClass $checkClass, ReflectionMethod $checkMethod): MethodRunResult
    {
        $finishCondition = $this->methodParser->getFinishCondition($checkMethod);

        if ($finishCondition instanceof FinishCount) {
            $methodRunResult = $this->countRunner->run($checkClass, $checkMethod, $types, $finishCondition);
        } elseif ($finishCondition instanceof FinishTime) {
            $methodRunResult = $this->timeRunner->run($checkClass, $checkMethod, $types, $finishCondition);
        } else {
            throw new Exception('unknown finish type');
        }
        return $methodRunResult;
    }
}
