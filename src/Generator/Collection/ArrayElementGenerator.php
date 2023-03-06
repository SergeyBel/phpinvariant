<?php

namespace PhpInvariant\Generator\Collection;

use Attribute;
use PhpInvariant\Generator\GeneratorInterface;
use PhpInvariant\Random\Random;

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
