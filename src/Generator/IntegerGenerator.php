<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

class IntegerGenerator extends Random implements GeneratorInterface
{


    public function __construct(
        public $min,
        public $max
    )
    {
    }

    public function get(): int
    {
        return $this->getInt($this->min, $this->max);
    }


}
