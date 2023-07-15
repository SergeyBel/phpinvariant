<?php

namespace PhpInvariant\Generator\Type\String;

use Attribute;

#[Attribute]
class StringType
{
    /**
     * @param array<string> $dictionary
     */
    public function __construct(
        public int $minLength,
        public int $maxLength,
        public array $dictionary
    ) {
    }
}
