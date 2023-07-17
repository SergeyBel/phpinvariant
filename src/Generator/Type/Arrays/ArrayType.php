<?php

namespace PhpInvariant\Generator\Type\Arrays;

use Attribute;
use PhpInvariant\Generator\Type\Integer\IntegerType;

#[Attribute]
class ArrayType
{
    public function __construct(
        public IntegerType $count,
        public mixed $elementType
    ) {
    }
}
