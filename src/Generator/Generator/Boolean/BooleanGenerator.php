<?php

namespace PhpInvariant\Generator\Generator\Boolean;

use PhpInvariant\Generator\Type\Boolean\BooleanType;
use PhpInvariant\Random\Random;

class BooleanGenerator
{
    public function __construct(
        private Random $random
    ) {
    }


    public function __invoke(BooleanType $type): bool
    {
        return (bool)($this->random->getInt(0, 1));
    }
}
