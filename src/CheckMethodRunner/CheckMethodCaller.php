<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\Generator\GeneratorInterface;
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
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function callMethod(ReflectionClass $checkClass, ReflectionMethod $checkMethod, array $generators, MethodRunResult $result): void
    {
        $callResult = $this->methodCaller->callMethod($checkClass, $checkMethod, $generators);
        $result->setErrorRuns($callResult->getErrorRuns());
        $result->incrementRunCount();
    }
}
