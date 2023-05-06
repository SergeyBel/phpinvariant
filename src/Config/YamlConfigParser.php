<?php

namespace PhpInvariant\Config;

use PhpInvariant\Runner\Dto\RunnerConfiguration;
use Symfony\Component\Yaml\Yaml;

class YamlConfigParser
{
    public function parse(string $filePath): RunnerConfiguration
    {
        $content = Yaml::parseFile($filePath);
        $parameters = $content['parameters'];

        return new RunnerConfiguration(
            $parameters['path'],
            $parameters['seed'],
            !$parameters['no-progress'],
        );
    }
}
