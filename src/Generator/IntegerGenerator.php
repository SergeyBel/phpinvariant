<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

class IntegerGenerator
{
    private int $min;
    private int $max;
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
    public function generate(Random $random): int
    {
        return $random->getInt($this->min, $this->max);
    }
}
