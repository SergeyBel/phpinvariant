<?php

namespace PhpInvariant\Generator\Type\Combine;

use Attribute;

#[Attribute]
class OneOfType
{
    /**
     * @param array<mixed> $types
     */
    public function __construct(public array $types)
    {
    }

}
