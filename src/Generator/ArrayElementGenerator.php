<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;
use Attribute;

#[Attribute]
class ArrayElementGenerator implements GeneratorInterface
{
    /**
     * @var array<mixed>
     */
    private array $data;

    /**
     * @param mixed[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function generate(Random $random): mixed
    {
        $keys = array_keys($this->data);
        $key = $keys[$random->getInt(0, count($keys) - 1)];
        return $this->data[$key];
    }
}
