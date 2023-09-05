<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

class StringGenerator extends Random implements GeneratorInterface
{
    private int $minLength;
    private int $maxLength;

    private array $dictionary;


    public function __construct(int $minLength, int $maxLength)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->alphabetic();
    }


    public function get(): mixed
    {
        $length = $this->getInt($this->minLength, $this->maxLength);

        $text = '';
        for ($i = 0; $i < $length; $i++) {
            $text .= $this->getArrayElement($this->dictionary);
        }

        return $text;

    }


    public function dictionary(array $dictionary)
    {
        $this->dictionary = $dictionary;
        return $this;
    }

    public function ascii()
    {
        $dictionary = [];
        for ($c = 0; $c <= 255; $c++) {
            $dictionary[] = chr($c);
        }

        return $this->dictionary($dictionary);
    }

    public function alphabetic()
    {
        return $this->dictionary(array_merge(range('A', 'Z'), range('a', 'z')));
    }

    public function unicode()
    {
        $dictionary = [];
        for ($i = 0; $i < 0xffff; $i++) {
            $dictionary[] = mb_chr($i);
        }
        return $this->dictionary($dictionary);
    }




}
