<?php

namespace PhpInvariant\Generator\Type\Arrays;

use Attribute;

#[Attribute]
class ArrayType
{
    public function __construct(
        public int $count,
        public mixed $elementType
    ) {
    }
}
