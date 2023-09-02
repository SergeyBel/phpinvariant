<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseInvariant\Exception\PhpInvariantAssertException;
use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\CheckMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\CheckMethodRunner\Dto\CheckMethodCallResult;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class CheckMethodGeneratorsCaller
{
    public function __construct(
        private GeneratorFactory $generatorFactory
    ) {
    }

    /**
     * @param array<mixed> $types
     * @throws ReflectionException
     * @throws ExpectationFailedException
     */
    public function callMethod(ReflectionClass $checkClass, ReflectionMethod $checkMethod, array $types): CheckMethodCallResult
    {

        $result = new CheckMethodCallResult();

        try {
            $checkMethod->invokeArgs($checkClass->newInstance());
        } catch (PhpInvariantAssertException $exception) {
            $result->addErrorRun(
                new ErrorRunResult(
                    $checkClass->getName(),
                    $checkMethod->getName(),
                    $exception->getMessage(),
                    $checkClass->getMethod('getArgs')->invoke($checkClass)
                )
            );
        }
        return $result;
    }
}
