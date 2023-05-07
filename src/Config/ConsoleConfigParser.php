<?php

namespace PhpInvariant\Config;

use PhpInvariant\Runner\Dto\RunnerConfiguration;
use Symfony\Component\Console\Input\InputInterface;

class ConsoleConfigParser
{
    public function parse(InputInterface $input): RunnerConfiguration
    {
        return new RunnerConfiguration(
            $input->getOption('path'),
            $input->getOption('seed'),
            !$input->getOption('no-progress'),
            $input->getOption('quiet')
        );
    }
}
