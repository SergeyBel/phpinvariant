<?php

namespace PhpInvariant\Generator\Scalar;

use Attribute;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\Random\Random;

#[Attribute]
class StringGenerator implements GeneratorInterface
{
    private int $minLength;
    private int $maxLength;


    public function __construct(int $minLength, int $maxLength)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }


    public function generate(Random $random): string
    {
        $alphabet = [];
        for ($char = 32; $char <= 127; $char++) {
            $alphabet[] = chr($char);
        }
        $length = $random->getInt($this->minLength, $this->maxLength);

        $text = '';
        for ($i = 0; $i < $length; $i++) {
            $text .= $alphabet[$random->getInt(0, count($alphabet) - 1)];
        }
        return $text;
    }
}
