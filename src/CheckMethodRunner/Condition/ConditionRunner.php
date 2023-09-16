<?php

namespace PhpInvariant\CheckMethodRunner\Condition;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use PhpInvariant\Exception\PhpInvariantException;
use PhpInvariant\Finish\FinishRuns;
use PhpInvariant\Finish\FinishSeconds;

use ReflectionMethod;

class ConditionRunner
{
    public function __construct(
        private CountCondition $countRunner,
        private TimeCondition $timeRunner
    ) {
    }

    public function runCondition(BaseInvariant $invariantClass, ReflectionMethod $checkMethod, object $finishCondition): MethodRunResult
    {
        if ($finishCondition instanceof FinishRuns) {
            $methodRunResult = $this->countRunner->run($invariantClass, $checkMethod, $finishCondition);
        } elseif ($finishCondition instanceof FinishSeconds) {
            $methodRunResult = $this->timeRunner->run($invariantClass, $checkMethod, $finishCondition);
        } else {
            throw new PhpInvariantException('unknown finish condition class: '.get_class($finishCondition));
        }
        return $methodRunResult;

    }

}
