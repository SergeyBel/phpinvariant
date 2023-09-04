<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

class IntegerGenerator extends Random implements GeneratorInterface
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
        return $this->getInt($this->min, $this->max);
    }


}
