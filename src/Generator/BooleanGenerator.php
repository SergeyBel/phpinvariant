<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

class BooleanGenerator extends Random implements GeneratorInterface
{
    public function get(): bool
    {
        return (bool)($this->getInt(0, 1));
    }

}
