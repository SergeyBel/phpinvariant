<?php

namespace PhpInvariant\Runner\Dto;

class RunnerConfiguration
{
    public function __construct(
        public readonly string $directory,
        public readonly ?int $seed
    ) {
    }
}
