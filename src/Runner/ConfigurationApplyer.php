<?php

namespace PhpInvariant\Runner;

use PhpInvariant\Random\Random;
use PhpInvariant\Runner\Dto\RunnerConfiguration;

class ConfigurationApplyer
{
    public function __construct(
        private Random $random
    ) {
    }
    public function applyConfiguration(RunnerConfiguration $configuration): void
    {
        if ($configuration->seed !== null) {
            $this->random->seed($configuration->seed);
        }
    }
}
