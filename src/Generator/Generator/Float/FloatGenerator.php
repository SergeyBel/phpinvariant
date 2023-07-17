<?php

namespace PhpInvariant\Generator\Generator\Float;

use PhpInvariant\Generator\Type\Float\FloatType;
use PhpInvariant\Random\Random;

class FloatGenerator
{
    public function __construct(
        private Random $random
    ) {
    }


    public function __invoke(FloatType $type): float
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
