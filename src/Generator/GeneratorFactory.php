<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Exception\PhpInvariantException;
use PhpInvariant\Generator\Generator\Arrays\ArrayElementGenerator;
use PhpInvariant\Generator\Generator\Combine\OneOfGenerator;
use PhpInvariant\Generator\Generator\DateTime\DateTimeGenerator;
use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\Generator\Scalar\IntegerGenerator;
use PhpInvariant\Generator\Type\Arrays\ArrayElementType;
use PhpInvariant\Generator\Type\Arrays\VectorType;
use PhpInvariant\Generator\Type\Combine\OneOfType;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use PhpInvariant\Generator\Type\Scalar\BooleanType;
use PhpInvariant\Generator\Type\Scalar\FloatType;
use PhpInvariant\Generator\Type\Scalar\IntegerType;
use PhpInvariant\Generator\Type\Scalar\StringType;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GeneratorFactory
{
    /**
     * @var array<string, string>
     */
    private array $mapping = [
        IntegerType::class => IntegerGenerator::class,
        FloatType::class => Generator\Scalar\FloatGenerator::class,
        BooleanType::class => Generator\Scalar\BooleanGenerator::class,
        StringType::class => Generator\Scalar\StringGenerator::class,
        DateTimeType::class => DateTimeGenerator::class,
        ArrayElementType::class => ArrayElementGenerator::class,
        VectorType::class => Generator\Arrays\VectorGenerator::class,
        OneOfType::class => OneOfGenerator::class

    ];

    public function __construct(private ContainerInterface $container)
    {
    }

    public function getGenerator(TypeInterface $type): GeneratorInterface
    {
        $typeClass = get_class($type);
        if (!array_key_exists($typeClass, $this->mapping)) {
            throw new PhpInvariantException('can not find generator for type '. $typeClass);
        }
        return $this->container->get($this->mapping[get_class($type)]);
    }

    public function addCustomGenerator(string $typeClass, string $generatorClass): void
    {
        $this->mapping[$typeClass] = $generatorClass;
    }
}
