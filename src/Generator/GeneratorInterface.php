<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

interface GeneratorInterface
{
    public function generate(Random $random): mixed ;
}
