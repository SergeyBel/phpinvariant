<?php

namespace PhpInvariant\Generator\Generator\String;

use PhpInvariant\Generator\Type\String\StringType;
use PhpInvariant\Generator\Type\String\UnicodeStringType;

class UnicodeStringGenerator
{
    public function __construct(
        private StringGenerator $stringGenerator
    ) {
    }

    public function __invoke(UnicodeStringType $type): string
    {
        $alphabet = [];
        for ($i = 0; $i < 0xffff; $i++) {
            $alphabet[] = mb_chr($i);
        }

        return call_user_func($this->stringGenerator, new StringType(
            $type->minLength,
            $type->maxLength,
            $alphabet
        ));

    }

}
