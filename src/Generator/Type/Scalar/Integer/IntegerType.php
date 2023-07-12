<?php

namespace PhpInvariant\Generator\Type\Scalar\Integer;

use Attribute;

#[Attribute]
class IntegerType
{
    public function __construct(public int $min, public int $max)
    {
    }
}
