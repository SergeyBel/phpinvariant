<?php

namespace PhpInvariant\Config;

use PhpInvariant\Runner\Dto\RunnerConfiguration;
use Symfony\Component\Console\Input\InputInterface;

class ConfigurationParser
{
    public function __construct(
        private ConsoleConfigParser $consoleParser,
        private YamlConfigParser $yamlParser
    ) {
    }

    public function parseConfiguration(InputInterface $input): RunnerConfiguration
    {
        if (!is_null($input->getOption('config'))) {
            return $this->yamlParser->parse($input->getOption('config'));
        }
        return $this->consoleParser->parse($input);
    }
}
