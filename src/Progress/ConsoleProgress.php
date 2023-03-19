<?php

namespace PhpInvariant\Progress;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class ConsoleProgress implements ProgressInterface
{
    private ProgressBar $progressBar;

    public function __construct()
    {
        $this->progressBar = new ProgressBar(new ConsoleOutput());
    }
    public function start(int $maxSteps): void
    {
        $this->progressBar->setMaxSteps($maxSteps);
    }

    public function step(): void
    {
        $this->progressBar->advance();
    }

    public function finish(): void
    {
        $this->progressBar->finish();
    }
}
