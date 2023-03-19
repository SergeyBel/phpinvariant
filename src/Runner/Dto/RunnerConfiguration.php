<?php

namespace PhpInvariant\Runner\Dto;

class RunnerConfiguration
{
    public function __construct(
        public readonly string $path,
        public readonly ?int $seed,
        public readonly bool $progressEnable
    ) {
    }
}
