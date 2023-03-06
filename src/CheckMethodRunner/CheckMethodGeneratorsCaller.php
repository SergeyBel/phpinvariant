<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseCheck\Exception\PhpInvariantAssertException;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\Random\Random;
use PhpInvariant\CheckMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\CheckMethodRunner\Dto\CheckMethodCallResult;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class CheckMethodGeneratorsCaller
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     * @throws ExpectationFailedException
     */
    public function callMethod(ReflectionClass $checkClass, ReflectionMethod $checkMethod, array $generators): CheckMethodCallResult
    {
        $parameters = [];
        foreach ($generators as $generator) {
            $parameters[] = $generator->generate($this->random);
        }
        $result = new CheckMethodCallResult($parameters);

        try {
            $checkMethod->invokeArgs($checkClass->newInstance(), $parameters);
        } catch (PhpInvariantAssertException $exception) {
            $result->addErrorRun(
                new ErrorRunResult(
                    $checkClass->getName(),
                    $checkMethod->getName(),
                    $exception->getMessage(),
                    $parameters
                )
            );
        }
        return $result;
    }
}
