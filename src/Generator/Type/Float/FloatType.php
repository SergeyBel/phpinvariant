<?php

namespace PhpInvariant\Generator\Type\Float;

use Attribute;

#[Attribute]
class FloatType
{
    public function __construct(public float $min, public float $max, public int $decimals)
    {
    }
}
