<?php

namespace PhpInvariant\Generator\Generators;

class IntegerGenerator extends BaseGenerator
{
    private int $min;
    private int $max;


    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }


    public function get(): int
    {
        $value = $this->getInt($this->min, $this->max);
        $this->register($value);

        return $value;
    }


}
