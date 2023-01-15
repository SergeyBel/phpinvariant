<?php

namespace PhpInvariant\TestMethodRunner;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\MethodParser\TestMethodParser;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;
use PhpInvariant\TestMethodRunner\Runner\CountRunner;
use ReflectionClass;
use ReflectionMethod;
use Exception;

class TestMethodRunner
{
    public function __construct(
        private TestMethodParser $methodParser,
        private CountRunner $countRunner
    ) {
    }
    public function runTestMethod(ReflectionClass $testClass, ReflectionMethod $testMethod): MethodRunResult
    {
        $generators = $this->methodParser->getGenerators($testMethod);
        $finishCondition = $this->methodParser->getFinishCondition($testMethod);

        if ($finishCondition instanceof FinishCount) {
            $methodRunResult = $this->countRunner->run($testClass, $testMethod, $generators, $finishCondition);
        } else {
            throw new Exception('unknown finish type');
        }
        return $methodRunResult;
    }
}
