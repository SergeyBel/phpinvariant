<?php

namespace PhpInvariant\Generator\Generator\Scalar\String;

use PhpInvariant\Generator\Type\Scalar\String\StringType;
use PhpInvariant\Random\Random;

class StringGenerator
{
    public function __construct(
        private Random $random
    ) {
    }


    public function __invoke(StringType $type): string
    {
        $alphabet = [];
        for ($char = 32; $char <= 127; $char++) {
            $alphabet[] = chr($char);
        }
        $length = $this->random->getInt($type->minLength, $type->maxLength);

        $text = '';
        for ($i = 0; $i < $length; $i++) {
            $text .= $alphabet[$this->random->getInt(0, count($alphabet) - 1)];
        }
        return $text;
    }
}
