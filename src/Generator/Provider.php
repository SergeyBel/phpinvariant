<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Generator\Generators\ArrayGenerator;
use PhpInvariant\Generator\Generators\BooleanGenerator;
use PhpInvariant\Generator\Generators\CombineGenerator;
use PhpInvariant\Generator\Generators\DateTimeGenerator;
use PhpInvariant\Generator\Generators\ElementsGenerator;
use PhpInvariant\Generator\Generators\FloatGenerator;
use PhpInvariant\Generator\Generators\GeneratorInterface;
use PhpInvariant\Generator\Generators\IntegerGenerator;
use PhpInvariant\Generator\Generators\StringGenerator;

class Provider
{
    public function integer(int $min, int $max): IntegerGenerator
    {
        return new IntegerGenerator($min, $max);
    }

    public function boolean(): BooleanGenerator
    {
        return new BooleanGenerator();
    }

    public function float(float $min, float $max): FloatGenerator
    {
        return new FloatGenerator($min, $max);
    }

    public function string(int $minLength, int $maxLength): StringGenerator
    {
        return new StringGenerator($minLength, $maxLength);
    }
    public function datetime(): DateTimeGenerator
    {
        return new DateTimeGenerator();
    }

    public function array(int $count, GeneratorInterface $elementGenerator): ArrayGenerator
    {
        return new ArrayGenerator($count, $elementGenerator);
    }

    /**
     * @param array<mixed> $data
     */
    public function elements(array $data, int $count): ElementsGenerator
    {
        return new ElementsGenerator($data, $count);
    }

    /**
     * @param array<GeneratorInterface> $generators
     */
    public function combine(array $generators): CombineGenerator
    {
        return new CombineGenerator($generators);
    }
}
