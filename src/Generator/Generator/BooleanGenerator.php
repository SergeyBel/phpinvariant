<?php

namespace PhpInvariant\Generator\Generator;

use PhpInvariant\Generator\Type\Scalar\BooleanType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class BooleanGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param BooleanType $type
     */
    public function generate(TypeInterface $type): bool
    {
        return (bool)($this->random->getInt(0, 1));
    }
}
