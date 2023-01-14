<?php

namespace PhpInvariant\TestMethodRunner;

use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\Random\Random;
use ReflectionClass;
use ReflectionMethod;
use ReflectionException;

class MethodCaller
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param array<GeneratorInterface> $generators
     * @throws ReflectionException
     */
    public function callMethod(ReflectionClass $testClass, ReflectionMethod $testMethod, array $generators): void
    {
        $parameters = [];
        foreach ($generators as $generator) {
            $parameters[] = $generator->generate($this->random);
        }
        $testMethod->invokeArgs($testClass->newInstance(), $parameters);
    }
}
