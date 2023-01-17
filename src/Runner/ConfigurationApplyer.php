<?php

namespace PhpInvariant\Runner;

use PhpInvariant\Random\Random;
use PhpInvariant\Runner\Dto\ConfigurationResult;
use PhpInvariant\Runner\Dto\RunnerConfiguration;

class ConfigurationApplyer
{
    public function __construct(
        private Random $random
    ) {
    }
    public function applyConfiguration(RunnerConfiguration $configuration): ConfigurationResult
    {
        $seed = $configuration->seed ?? $this->random->getInt(1, 1000000);
        $this->random->seed($seed);
        $result = new ConfigurationResult($seed);
        return $result;
    }
}
