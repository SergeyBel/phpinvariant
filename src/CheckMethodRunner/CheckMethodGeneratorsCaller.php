<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\BaseInvariant\Exception\PhpInvariantAssertException;
use PhpInvariant\CheckMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\CheckMethodRunner\Dto\CheckMethodCallResult;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionMethod;
use ReflectionException;

class CheckMethodGeneratorsCaller
{
    public function __construct(
    ) {
    }

    /**
     * @throws ReflectionException
     * @throws ExpectationFailedException
     */
    public function callMethod(BaseInvariant $checkClass, ReflectionMethod $checkMethod): CheckMethodCallResult
    {

        $result = new CheckMethodCallResult();

        try {
            /**
             * @throws PhpInvariantAssertException
             */
            $checkMethod->invoke($checkClass);
        } catch (PhpInvariantAssertException $exception) {
            $result->addErrorRun(
                new ErrorRunResult(
                    get_class($checkClass),
                    $checkMethod->getName(),
                    $exception->getMessage(),
                    $checkClass->getArgs()
                )
            );
        }
        return $result;
    }
}
