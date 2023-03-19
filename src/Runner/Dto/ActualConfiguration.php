<?php

namespace PhpInvariant\Runner\Dto;

use PhpInvariant\Progress\ProgressInterface;

class ActualConfiguration
{
    public function __construct(
        public int $seed,
        public ProgressInterface $progress
    ) {
    }
}
