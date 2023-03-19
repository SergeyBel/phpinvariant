<?php

namespace PhpInvariant\Progress;

class ProgressFactory
{
    public function __construct(
        private ConsoleProgress $consoleProgress,
        private EmptyProgress $emptyProgress
    ) {
    }

    public function getProgress(bool $progressEnable): ProgressInterface
    {
        if ($progressEnable) {
            return $this->consoleProgress;
        } else {
            return $this->emptyProgress;
        }
    }
}
