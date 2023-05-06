<?php

namespace PhpInvariant\Generator\Type\Scalar;

use Attribute;
use PhpInvariant\Generator\TypeInterface;

#[Attribute]
class IntegerType implements TypeInterface
{
    public function __construct(public int $min, public int $max)
    {
    }
}
