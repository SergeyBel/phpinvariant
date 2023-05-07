<?php

namespace PhpInvariant\Generator\Type\Arrays;

use PhpInvariant\Generator\TypeInterface;
use Attribute;

#[Attribute]
class VectorType implements TypeInterface
{
    public function __construct(
        public int $count,
        public TypeInterface $elementType
    ) {
    }
}
