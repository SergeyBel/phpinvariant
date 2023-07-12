<?php

namespace PhpInvariant\Config;

use PhpInvariant\Config\Exception\ConfigParseException;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
use Symfony\Component\Console\Input\InputInterface;

class ConsoleConfigParser
{
    public function parse(InputInterface $input): RunnerConfiguration
    {
        if (is_null($input->getOption('path'))) {
            throw ConfigParseException::pathNotSet();
        }
        return new RunnerConfiguration(
            $input->getOption('path'),
            $input->getOption('seed'),
            !$input->getOption('no-progress'),
            $input->getOption('quiet')
        );
    }
}
