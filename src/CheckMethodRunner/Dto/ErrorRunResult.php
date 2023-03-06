<?php

namespace PhpInvariant\CheckMethodRunner\Dto;

class ErrorRunResult
{
    /**
     * @param array<mixed> $parameters
     */
    public function __construct(
        public string $checkName,
        public string $methodName,
        public string $message,
        public array $parameters
    ) {
    }
}
