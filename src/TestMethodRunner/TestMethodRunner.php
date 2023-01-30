<?php

namespace PhpInvariant\TestMethodRunner;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Finish\FinishTime;
use PhpInvariant\MethodParser\TestMethodParser;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use PhpInvariant\TestMethodRunner\Condition\CountCondition;
use PhpInvariant\TestMethodRunner\Condition\TimeCondition;
use ReflectionClass;
use ReflectionMethod;
use Exception;

class TestMethodRunner
{
    public function __construct(
        private TestMethodParser $methodParser,
        private CountCondition $countRunner,
        private TimeCondition $timeRunner
    ) {
    }
    public function runTestMethod(ReflectionClass $testClass, ReflectionMethod $testMethod): MethodRunResult
    {
        $generators = $this->methodParser->getGenerators($testMethod);
        $finishCondition = $this->methodParser->getFinishCondition($testMethod);

        if ($finishCondition instanceof FinishCount) {
            $methodRunResult = $this->countRunner->run($testClass, $testMethod, $generators, $finishCondition);
        } elseif ($finishCondition instanceof FinishTime) {
            $methodRunResult = $this->timeRunner->run($testClass, $testMethod, $generators, $finishCondition);
        } else {
            throw new Exception('unknown finish type');
        }
        return $methodRunResult;
    }
}
