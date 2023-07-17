<?php

namespace PhpInvariant\Generator\Type\Arrays;

use Attribute;
use PhpInvariant\Generator\Type\Integer\IntegerType;

#[Attribute]
class AssociativeArrayType
{
    public function __construct(
        public mixed $key,
        public mixed $value,
        public IntegerType $count,
        public IntegerType $depth,
    ) {
    }
}
