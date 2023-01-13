<?php

namespace PhpInvariant\Application;

use PhpInvariant\DependencyInjection\DependencyInjection;
use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    public function registerCommands(): void
    {
        $builder = new DependencyInjection();
        $container = $builder->compileContainer();
        $services = $builder->getServicesByTag($container, 'console.command');
        foreach ($services as $service) {
            $this->add($service);
        }
    }
}
