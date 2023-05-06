<?php

namespace PhpInvariant\Generator\Generator;

use PhpInvariant\Generator\TypeInterface;

interface GeneratorInterface
{
    public function generate(TypeInterface $type): mixed;
}
