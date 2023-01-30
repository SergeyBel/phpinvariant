<?php

namespace PhpInvariant\TestMethodRunner\Dto;

class ErrorRunResult
{
    /**
     * @param array<mixed> $parameters
     */
    public function __construct(
        public string $testName,
        public string $methodName,
        public string $message,
        public array $parameters
    ) {
    }
}
