<?php

namespace PhpInvariant\InvariantRunner;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\CheckMethodRunner\CheckMethodFinder;
use PhpInvariant\CheckMethodRunner\CheckMethodRunner;
use PhpInvariant\InvariantRunner\Dto\CheckRunResult;
use ReflectionClass;

class InvariantRunner
{
    public function __construct(
        private CheckMethodRunner $checkMethodRunner,
        private CheckMethodFinder $checkMethodFinder,
        private InvariantInitializer $invariantInitializer
    ) {
    }
    public function runInvariant(ReflectionClass $invariantClass): CheckRunResult
    {
        $result = new CheckRunResult();

        $checkMethods = $this->checkMethodFinder->getCheckMethods($invariantClass);

        /** @var BaseInvariant $instance */
        $instance = $invariantClass->newInstance();
        $this->invariantInitializer->initialize($instance);

        foreach ($checkMethods as $checkMethod) {
            $methodRunResult = $this->checkMethodRunner->runCheckMethod($instance, $checkMethod);
            $result->addMethodRunResult($methodRunResult);
        }
        return $result;
    }


}
