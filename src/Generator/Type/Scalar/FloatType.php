<?php

namespace PhpInvariant\Generator\Type\Scalar;

use Attribute;
use PhpInvariant\Generator\TypeInterface;

#[Attribute]
class FloatType implements TypeInterface
{
    public function __construct(public float $min, public float $max, public int $decimals)
    {
    }
}
