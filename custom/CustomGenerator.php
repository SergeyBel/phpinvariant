<?php

namespace Custom;

use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class CustomGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }


    /**
     * @param CustomType $type
     */
    public function generate(TypeInterface $type): string
    {
        return $type->prefix.' '.$this->random->getInt(1, 100);

    }
}
