<?php

namespace PhpInvariant\Generator\Generator\Scalar;

use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\Type\Scalar\IntegerType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class IntegerGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param IntegerType $type
     */
    public function generate(TypeInterface $type): int
    {
        return $this->random->getInt($type->min, $type->max);
    }
}
