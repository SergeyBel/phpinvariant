<?php

namespace PhpInvariant\Generator\Generators;

class StringGenerator extends BaseGenerator
{
    private int $minLength;
    private int $maxLength;

    /**
     * @var array<string>
     */
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
            $element = $this->getArrayElement($this->dictionary);
            //dump(mb_ord($element));
            $text .= $element;
        }

        $this->register($text);
        return $text;

    }


    /**
     * @param array<string> $dictionary
     * @return $this
     */
    public function dictionary(array $dictionary): self
    {
        $this->dictionary = $dictionary;
        return $this;
    }

    public function ascii(): self
    {
        $dictionary = [];
        for ($c = 0; $c <= 255; $c++) {
            $dictionary[] = chr($c);
        }

        return $this->dictionary($dictionary);
    }

    public function alphabetic(): self
    {
        return $this->dictionary(array_merge(range('A', 'Z'), range('a', 'z')));
    }

    public function unicode(): self
    {
        $dictionary = [];
        for ($i = 0; $i < 0xffff; $i++) {
            $dictionary[] = mb_chr($i);
        }
        return $this->dictionary($dictionary);
    }
}
