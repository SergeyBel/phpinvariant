<?php

namespace PhpInvariant\Config;

use PhpInvariant\Config\Exception\ConfigParseException;
use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
use PhpInvariant\DependencyInjection\Container;

class YamlConfigParser
{
    public function __construct(
        private Container $container,
        private GeneratorFactory $generatorFactory
    ) {
    }

    public function parse(string $filePath): RunnerConfiguration
    {
        try {
            $content = Yaml::parseFile($filePath);
        } catch (ParseException $e) {
            throw ConfigParseException::becauseYamlNotParsed($e->getMessage());
        }

        $this->addCustomGenerators($content);

        if (!isset($content['parameters'])) {
            throw ConfigParseException::becauseParametersNotSet();
        }

        $parameters = $content['parameters'];

        if (!isset($parameters['path'])) {
            throw ConfigParseException::becausePathNotSet();
        }

        return new RunnerConfiguration(
            $parameters['path'],
            $parameters['seed'] ?? null,
            !($parameters['no-progress'] ?? false),
            $parameters['quiet'] ?? false
        );
    }

    /**
     * @param array<mixed> $content
     */
    private function addCustomGenerators(array $content): void
    {
        $customGenerators = $content['generators'] ?? [];
        foreach ($customGenerators as $customType => $customGenerator) {
            $this->container->addService($customGenerator);
            $this->generatorFactory->addCustomGenerator($customType, $customGenerator);
        }
    }
}
