<?php

namespace PhpInvariant\Generator;

class Provider
{
    public function integer($min, $max): IntegerGenerator
    {
        return new IntegerGenerator($min, $max);
    }

    public function boolean(): BooleanGenerator
    {
        return new BooleanGenerator();
    }

    public function float($min, $max): FloatGenerator
    {
        return new FloatGenerator($min, $max);
    }

    public function string($minLength, $maxLength): StringGenerator
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

    public function elements(array $data, int $count): ElementsGenerator
    {
        return new ElementsGenerator($data, $count);
    }
}
