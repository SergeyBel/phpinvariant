<?php

namespace PhpInvariant\TestMethodRunner;

use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\Random\Random;
use PhpInvariant\TestMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\TestMethodRunner\Dto\TestMethodCallResult;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class TestMethodGeneratorsCaller
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
    public function callMethod(ReflectionClass $testClass, ReflectionMethod $testMethod, array $generators): TestMethodCallResult
    {
        $parameters = [];
        foreach ($generators as $generator) {
            $parameters[] = $generator->generate($this->random);
        }
        $result = new TestMethodCallResult($parameters);

        try {
            $testMethod->invokeArgs($testClass->newInstance(), $parameters);
        } catch (ExpectationFailedException $exception) {
            $result->addErrorRun(
                new ErrorRunResult(
                    $testClass->getName(),
                    $testMethod->getName(),
                    $exception->getMessage(),
                    $parameters
                )
            );
        }
        return $result;
    }
}
