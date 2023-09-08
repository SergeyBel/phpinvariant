<?php

namespace PhpInvariant\Generator\Generators;

class StringGenerator extends BaseGenerator
{
    private const ASCII = 'ascii';
    private const UNICODE = 'unicode';

    private int $minLength;
    private int $maxLength;

    private ?string $preDefine = null;

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
        if (count($this->dictionary) > 0) {
            for ($i = 0; $i < $length; $i++) {
                $element = $this->getArrayElement($this->dictionary);
                $text .= $element;
            }
        } elseif ($this->preDefine === self::ASCII) {
            for ($i = 0; $i < $length; $i++) {
                $char = $this->getInt(0, 255);
                $text .= chr($char);
            }
        } elseif ($this->preDefine === self::UNICODE) {
            for ($i = 0; $i < $length; $i++) {
                $char = $this->getInt(0, 0xffff);
                $text .= mb_chr($char);
            }
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
        $this->preDefine = self::ASCII;
        return $this;
    }

    public function alphabetic(): self
    {
        return $this->dictionary(array_merge(range('A', 'Z'), range('a', 'z')));
    }

    public function alphanumeric(): self
    {
        return $this->dictionary(array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9')));
    }

    public function unicode(): self
    {
        $this->preDefine = self::UNICODE;
        return $this;
    }
}
