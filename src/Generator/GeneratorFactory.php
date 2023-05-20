<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Exception\PhpInvariantException;
use PhpInvariant\Generator\Generator\GeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GeneratorFactory
{
    public const GENERATOR_NAMESPACE = 'PhpInvariant\Generator\Generator\\';
    public const TYPE_NAMESPACE = 'PhpInvariant\Generator\Type\\';
    public const GENERATOR_POSTFIX = 'Generator';
    public const TYPE_POSTFIX = 'Type';
    /**
     * @var array<string, string>
     */
    private array $customGeneratorsMapping = [];

    public function __construct(
        private ContainerInterface $container
    ) {
    }

    public function getGenerator(TypeInterface $type): GeneratorInterface
    {
        $generator = $this->getStandardGenerator($type);
        if (is_null($generator)) {
            $generator = $this->getCustomGenerator($type);
        }

        if (is_null($generator)) {
            throw new PhpInvariantException('can not find generator for '. get_class($type));
        }

        return $this->container->get($generator);
    }

    public function addCustomGenerator(string $typeClass, string $generatorClass): void
    {
        $this->customGeneratorsMapping[$typeClass] = $generatorClass;
    }

    private function getCustomGenerator(TypeInterface $type): ?string
    {
        $typeClass = get_class($type);

        if (array_key_exists($typeClass, $this->customGeneratorsMapping)) {
            return $this->customGeneratorsMapping[$typeClass];
        }
        return null;

    }

    private function getStandardGenerator(TypeInterface $type): ?string
    {
        $typeClass = get_class($type);
        $generatorName = str_replace(self::TYPE_NAMESPACE, self::GENERATOR_NAMESPACE, $typeClass);
        $generatorName = str_replace(self::TYPE_POSTFIX, self::GENERATOR_POSTFIX, $generatorName);
        if (!class_exists($generatorName)) {
            return null;
        }
        return $generatorName;

    }

}
