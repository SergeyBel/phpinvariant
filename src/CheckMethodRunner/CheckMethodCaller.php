<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class CheckMethodCaller
{
    public function __construct(
        private CheckMethodGeneratorsCaller $methodCaller
    ) {
    }

    /**
     * @param array<mixed> $types
     * @throws ReflectionException
     */
    public function callMethod(ReflectionClass $checkClass, ReflectionMethod $checkMethod, MethodRunResult $result): void
    {
        $callResult = $this->methodCaller->callMethod($checkClass, $checkMethod);
        $result->setErrorRuns($callResult->getErrorRuns());
        $result->incrementRunCount();
    }
}
