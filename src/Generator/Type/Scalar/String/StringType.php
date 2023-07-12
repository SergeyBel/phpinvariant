<?php

namespace PhpInvariant\Generator\Type\Scalar\String;

use Attribute;

#[Attribute]
class StringType
{
    public function __construct(public int $minLength, public int $maxLength)
    {
    }
}
