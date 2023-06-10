<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseInvariant\Exception\PhpInvariantAssertException;
use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Generator\TypeInterface;
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
     * @param array<TypeInterface> $types
     * @throws ReflectionException
     * @throws ExpectationFailedException
     */
    public function callMethod(ReflectionClass $checkClass, ReflectionMethod $checkMethod, array $types): CheckMethodCallResult
    {
        $parameters = [];
        foreach ($types as $type) {
            $generator = $this->generatorFactory->getGenerator($type);
            $parameters[] = $generator->generate($type);
        }
        $result = new CheckMethodCallResult();

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
