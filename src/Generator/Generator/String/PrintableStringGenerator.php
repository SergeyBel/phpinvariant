<?php

namespace PhpInvariant\Generator\Generator\String;

use PhpInvariant\Generator\Type\String\PrintableStringType;
use PhpInvariant\Generator\Type\String\StringType;

class PrintableStringGenerator
{
    public function __construct(
        private StringGenerator $stringGenerator
    ) {
    }

    public function __invoke(PrintableStringType $type): string
    {
        $alphabet = [];
        for ($i = 32; $i < 127; $i++) {
            $alphabet[] = chr($i);
        }

        return call_user_func(
            $this->stringGenerator,
            new StringType(
                $type->minLength,
                $type->maxLength,
                $alphabet
            )
        );

    }


}
