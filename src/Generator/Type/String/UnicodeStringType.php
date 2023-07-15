<?php

namespace PhpInvariant\Generator\Type\String;

use Attribute;

#[Attribute]
class UnicodeStringType
{
    public function __construct(public int $minLength, public int $maxLength)
    {
    }

}
