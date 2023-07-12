<?php

namespace Custom;

use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class CustomGenerator
{
    public function __construct(
        private Random $random
    ) {
    }



    public function __invoke(CustomType $type): string
    {
        return $type->prefix.' '.$this->random->getInt(1, 100);

    }
}
