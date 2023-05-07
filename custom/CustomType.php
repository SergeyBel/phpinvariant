<?php

namespace Custom;

use Attribute;
use PhpInvariant\Generator\TypeInterface;

#[Attribute]
class CustomType implements TypeInterface
{
    public function __construct(public string $prefix)
    {
    }
}
