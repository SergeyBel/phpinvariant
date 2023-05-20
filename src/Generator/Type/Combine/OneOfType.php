<?php

namespace PhpInvariant\Generator\Type\Combine;

use Attribute;
use PhpInvariant\Generator\TypeInterface;

#[Attribute]
class OneOfType implements TypeInterface
{
    /**
     * @param array<TypeInterface> $types
     */
    public function __construct(public array $types)
    {
    }

}
