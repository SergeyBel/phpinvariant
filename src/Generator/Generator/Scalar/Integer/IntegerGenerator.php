<?php

namespace PhpInvariant\Generator\Generator\Scalar\Integer;

use PhpInvariant\Generator\Type\Scalar\Integer\IntegerType;
use PhpInvariant\Random\Random;

class IntegerGenerator
{
    public function __construct(
        private Random $random
    ) {
    }

    public function __invoke(IntegerType $type): int
    {
        return $this->random->getInt($type->min, $type->max);
    }
}
