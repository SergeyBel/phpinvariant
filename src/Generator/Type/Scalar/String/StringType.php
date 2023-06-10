<?php

namespace PhpInvariant\Generator\Type\Scalar\String;

use Attribute;
use PhpInvariant\Generator\TypeInterface;

#[Attribute]
class StringType implements TypeInterface
{
    public function __construct(public int $minLength, public int $maxLength)
    {
    }
}
