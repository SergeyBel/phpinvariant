<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\BaseInvariant\Exception\PhpInvariantAssertException;
use PhpInvariant\CheckMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\CheckMethodRunner\Dto\CheckMethodCallResult;
use PhpInvariant\Registrator\ParametersRegistrator;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionMethod;
use ReflectionException;

class CheckMethodGeneratorsCaller
{
    public function __construct(
        private InvariantClassExecutor $invariantClassExecutor
    ) {

    }

    /**
     * @throws ReflectionException
     * @throws ExpectationFailedException
     */
    public function callMethod(BaseInvariant $invariantClass, ReflectionMethod $checkMethod): CheckMethodCallResult
    {

        $result = new CheckMethodCallResult();
        ParametersRegistrator::clear();


        try {
            $this->invariantClassExecutor->executeBefore($invariantClass);
            $this->invariantClassExecutor->executeCheckMethod($invariantClass, $checkMethod);
            $this->invariantClassExecutor->executeAfter($invariantClass);

        } catch (PhpInvariantAssertException $exception) {
            $result->addErrorRun(
                new ErrorRunResult(
                    get_class($invariantClass),
                    $checkMethod->getName(),
                    $exception->getMessage(),
                    ParametersRegistrator::get()
                )
            );
        }
        return $result;
    }
}
