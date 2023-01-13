<?php

namespace PhpInvariant\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\TaggedContainerInterface;

class DependencyInjection
{
    public function compileContainer(): TaggedContainerInterface
    {
        $containerBuilder = new ContainerBuilder();
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__.'/../Config'));
        $loader->load('services.yaml');
        $containerBuilder->compile();
        return $containerBuilder;
    }

    /**
     * @return object[]
     */
    public function getServicesByTag(TaggedContainerInterface $container, string $tag): array
    {
        $services = [];
        foreach ($container->findTaggedServiceIds($tag) as $className => $definition) {
            $services[] = $container->get($className);
        }

        return $services;
    }
}
