<?php

namespace PhpInvariant\Progress;

use PhpInvariant\Runner\Dto\RunnerConfiguration;

class ProgressFactory
{
    public function __construct(
        private ConsoleProgress $consoleProgress,
        private EmptyProgress $emptyProgress
    ) {
    }

    public function getProgress(RunnerConfiguration $configuration): ProgressInterface
    {
        if (!$configuration->progressEnable) {
            return $this->emptyProgress;
        }

        if ($configuration->quiet) {
            return $this->emptyProgress;
        }

        return $this->consoleProgress;

    }
}
