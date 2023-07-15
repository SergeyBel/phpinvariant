<?php

namespace PhpInvariant\Generator\Type\String;

use Attribute;

#[Attribute]
class StringType
{
    public function __construct(
        public int $minLength,
        public int $maxLength,
        public array $dictionary
    ) {
    }
}
