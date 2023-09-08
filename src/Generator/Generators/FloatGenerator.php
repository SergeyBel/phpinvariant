<?php

namespace PhpInvariant\Generator\Generators;

class FloatGenerator extends BaseGenerator
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

        $value = round($integerPart + floatval($realPart), $this->decimals);

        $this->register($value);
        return $value;
    }


    public function decimals(int $decimals): self
    {
        $this->decimals = $decimals;
        return $this;
    }




}
