<?php

namespace PhpInvariant\Generator\Type\Arrays;

use PhpInvariant\Generator\TypeInterface;
use Attribute;

#[Attribute]
class ArrayElementType implements TypeInterface
{
    /**
     * @param array<mixed> $data
     */
    public function __construct(public array $data, public int $count)
    {
    }
}
