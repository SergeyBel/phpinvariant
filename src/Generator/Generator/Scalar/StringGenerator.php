<?php

namespace PhpInvariant\Generator\Generator\Scalar;

use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\Type\Scalar\StringType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class StringGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param StringType $type
     */
    public function generate(TypeInterface $type): string
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
