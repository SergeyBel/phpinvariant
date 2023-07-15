<?php

namespace PhpInvariant\Generator\Type\String;

use Attribute;

#[Attribute]
class PrintableStringType
{
    public function __construct(public int $minLength, public int $maxLength)
    {
    }
}
