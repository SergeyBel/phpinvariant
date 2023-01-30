<?php

namespace PhpInvariant\Generator;

use Attribute;
use PhpInvariant\Random\Random;

#[Attribute]

class BooleanGenerator implements GeneratorInterface
{
    public function generate(Random $random): mixed
    {
        return (bool)($random->getInt(0, 1));
    }
}
