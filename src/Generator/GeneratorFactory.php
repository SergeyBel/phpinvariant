<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Exception\PhpInvariantException;
use PhpInvariant\Generator\Generator\ArraySubsetGenerator;
use PhpInvariant\Generator\Generator\BooleanGenerator;
use PhpInvariant\Generator\Generator\DateTimeGenerator;
use PhpInvariant\Generator\Generator\FloatGenerator;
use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\Generator\IntegerGenerator;
use PhpInvariant\Generator\Generator\StringGenerator;
use PhpInvariant\Generator\Type\Arrays\ArraySubsetType;
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
        FloatType::class => FloatGenerator::class,
        BooleanType::class => BooleanGenerator::class,
        StringType::class => StringGenerator::class,
        ArraySubsetType::class => ArraySubsetGenerator::class,
        DateTimeType::class => DateTimeGenerator::class,
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
}
