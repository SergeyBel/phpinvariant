<?php

namespace PhpInvariant\Generator\Scalar;

use Attribute;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\Random\Random;

#[Attribute]
class FloatGenerator implements GeneratorInterface
{
    private float $min;
    private float $max;
    private int $decimals;
    public function __construct(float $min, float $max, int $decimals)
    {
        $this->min = $min;
        $this->max = $max;
        $this->decimals = $decimals;
    }

    public function generate(Random $random): float
    {
        $maxIntegerPart = (int)floor($this->max);
        $minIntegerPart = (int)floor($this->min);
        $maxRealPart = $this->max - $maxIntegerPart;

        $integerPart = $random->getInt($minIntegerPart, $maxIntegerPart);

        $denominator = 10 ** $this->decimals;
        $realMax = ($integerPart === $maxIntegerPart) ? round($maxRealPart * $denominator) : $denominator;


        $realPart = $random->getInt(0, $realMax) / $denominator;

        return round($integerPart + floatval($realPart), $this->decimals);
    }
}
