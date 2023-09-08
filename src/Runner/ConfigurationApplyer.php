<?php

namespace PhpInvariant\Runner;

use PhpInvariant\Progress\ProgressFactory;
use PhpInvariant\Random\SeedSetter;
use PhpInvariant\Runner\Dto\ActualConfiguration;
use PhpInvariant\Runner\Dto\RunnerConfiguration;

class ConfigurationApplyer
{
    public function __construct(
        private ProgressFactory $progressFactory,
        private SeedSetter $seedSetter
    ) {
    }
    public function applyConfiguration(RunnerConfiguration $configuration): ActualConfiguration
    {
        $seed = $configuration->seed ?? random_int(1, 1000000);
        $this->seedSetter->setSeed($seed);
        $result = new ActualConfiguration($seed, $this->progressFactory->getProgress($configuration));
        return $result;
    }
}
