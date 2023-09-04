<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;
use ReflectionException;
use ReflectionMethod;

class CheckMethodCaller
{
    public function __construct(
        private CheckMethodGeneratorsCaller $methodCaller
    ) {
    }

    /**
     * @throws ReflectionException
     */
    public function callMethod(BaseInvariant $checkClass, ReflectionMethod $checkMethod, MethodRunResult $result): void
    {
        $callResult = $this->methodCaller->callMethod($checkClass, $checkMethod);
        $result->setErrorRuns($callResult->getErrorRuns());
        $result->incrementRunCount();
    }
}
