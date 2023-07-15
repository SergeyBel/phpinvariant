<?php

namespace PhpInvariant\Generator\Generator\String;

use PhpInvariant\Generator\Type\String\StringType;
use PhpInvariant\Random\Random;

class StringGenerator
{
    public function __construct(
        private Random $random
    ) {
    }


    public function __invoke(StringType $type): string
    {
        $length = $this->random->getInt($type->minLength, $type->maxLength);

        $text = '';
        for ($i = 0; $i < $length; $i++) {
            $text .= $type->dictionary[$this->random->getInt(0, count($type->dictionary) - 1)];
        }
        return $text;
    }
}
