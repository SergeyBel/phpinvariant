<?php

namespace PhpInvariant\Config;

use PhpInvariant\Config\Exception\ConfigParseException;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
use PhpInvariant\DependencyInjection\Container;

class YamlConfigParser
{
    public function __construct(
        private Container $container,
    ) {
    }

    public function parse(string $filePath): RunnerConfiguration
    {
        try {
            $content = Yaml::parseFile($filePath);
        } catch (ParseException $e) {
            throw ConfigParseException::yamlNotParsed($e->getMessage());
        }

        if (!isset($content['parameters'])) {
            throw ConfigParseException::parametersNotSet();
        }

        $parameters = $content['parameters'];

        if (!isset($parameters['path'])) {
            throw ConfigParseException::pathNotSet();
        }

        return new RunnerConfiguration(
            $parameters['path'],
            $parameters['seed'] ?? null,
            !($parameters['no-progress'] ?? false),
            $parameters['quiet'] ?? false
        );
    }

}
