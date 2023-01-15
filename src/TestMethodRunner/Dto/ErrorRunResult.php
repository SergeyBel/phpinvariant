<?php

namespace PhpInvariant\TestMethodRunner\Dto;

class ErrorRunResult
{
    public function __construct(
        public string $testName,
        public string $methodName,
        public string $message,
        public string $trace
    ) {
    }
}
