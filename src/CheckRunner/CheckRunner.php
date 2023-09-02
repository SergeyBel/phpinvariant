<?php

namespace PhpInvariant\CheckRunner;

use PhpInvariant\CheckMethodRunner\CheckMethodRunner;
use PhpInvariant\CheckRunner\Dto\CheckRunResult;
use ReflectionClass;
use ReflectionMethod;

class CheckRunner
{
    public const METHOD_MASK = 'check';

    public function __construct(
        private CheckMethodRunner $checkMethodRunner
    ) {
    }
    public function runCheck(ReflectionClass $checkClass): CheckRunResult
    {
        $configureMethod = $checkClass->getMethod('configure');
        $configureMethod->invoke($checkClass);

        $result = new CheckRunResult();

        $publicMethods = $checkClass->getMethods(ReflectionMethod::IS_PUBLIC);
        $checkMethods = [];

        foreach ($publicMethods as $publicMethod) {
            if ($publicMethod->class === $checkClass->getName() && $this->isCheckMethod($publicMethod)) {
                $checkMethods[] = $publicMethod;
            }
        }

        foreach ($checkMethods as $checkMethod) {
            $methodRunResult = $this->checkMethodRunner->runCheckMethod($checkClass, $checkMethod);
            $result->addMethodRunResult($methodRunResult);
        }
        return $result;
    }

    private function isCheckMethod(ReflectionMethod $method): bool
    {
        return str_starts_with($method->getName(), self::METHOD_MASK);
    }
}
