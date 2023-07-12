<?php

namespace PhpInvariant\Generator\Type\Arrays;

use Attribute;

#[Attribute]
class FromArrayType
{
    /**
     * @param array<mixed> $data
     */
    public function __construct(public array $data, public int $count)
    {
    }
}
