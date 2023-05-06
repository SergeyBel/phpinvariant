<?php

namespace PhpInvariant\Generator\Generator;

use PhpInvariant\Generator\Type\Scalar\FloatType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class FloatGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param FloatType $type
     */
    public function generate(TypeInterface $type): float
    {
        $maxIntegerPart = (int)floor($type->max);
        $minIntegerPart = (int)floor($type->min);
        $maxRealPart = $type->max - $maxIntegerPart;

        $integerPart = $this->random->getInt($minIntegerPart, $maxIntegerPart);

        $denominator = 10 ** $type->decimals;
        $realMax = ($integerPart === $maxIntegerPart) ? round($maxRealPart * $denominator) : $denominator;


        $realPart = $this->random->getInt(0, $realMax) / $denominator;

        return round($integerPart + floatval($realPart), $type->decimals);
    }
}
