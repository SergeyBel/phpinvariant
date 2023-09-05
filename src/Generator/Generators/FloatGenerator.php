<?php

namespace PhpInvariant\Generator\Generators;

use PhpInvariant\Random\Random;

class FloatGenerator extends Random implements GeneratorInterface
{
    private float $min;
    private float $max;

    private int $decimals = 2;


    public function __construct(float $min, float $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function get(): float
    {
        $maxIntegerPart = (int)floor($this->max);
        $minIntegerPart = (int)floor($this->min);
        $maxRealPart = $this->max - $maxIntegerPart;

        $integerPart = $this->getInt($minIntegerPart, $maxIntegerPart);

        $denominator = 10 ** $this->decimals;
        $realMax = ($integerPart === $maxIntegerPart) ? round($maxRealPart * $denominator) : $denominator;


        $realPart = $this->getInt(0, $realMax) / $denominator;

        return round($integerPart + floatval($realPart), $this->decimals);
    }


    public function decimals(int $decimals): self
    {
        $this->decimals = $decimals;
        return $this;
    }




}
