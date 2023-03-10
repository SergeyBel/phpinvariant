<?php

namespace PhpInvariant\Generator\Scalar;

use Attribute;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\Random\Random;

#[Attribute]
class IntegerGenerator implements GeneratorInterface
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
