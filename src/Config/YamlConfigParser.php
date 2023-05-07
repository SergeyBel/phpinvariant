<?php

namespace PhpInvariant\Config;

use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
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
        $content = Yaml::parseFile($filePath);
        $this->addCustomGenerators($content);

        $parameters = $content['parameters'];
        return new RunnerConfiguration(
            $parameters['path'],
            $parameters['seed'] ?? null,
            !($parameters['no-progress'] ?? false),
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
