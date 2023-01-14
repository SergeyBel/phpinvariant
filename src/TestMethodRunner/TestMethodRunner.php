<?php

namespace PhpInvariant\TestMethodRunner;

use PhpInvariant\Finish\FinishCount;
use PhpInvariant\MethodParser\TestMethodParser;
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
    public function runTestMethod(ReflectionClass $testClass, ReflectionMethod $testMethod): void
    {
        $generators = $this->methodParser->getGenerators($testMethod);
        $finishCondition = $this->methodParser->getFinishCondition($testMethod);

        if ($finishCondition instanceof FinishCount) {
            $this->countRunner->run($testClass, $testMethod, $generators, $finishCondition);
        }

        throw new Exception('unknown finish type');
    }
}
