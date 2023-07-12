<?php

namespace PhpInvariant\Generator\Exception;

use PhpInvariant\Exception\PhpInvariantException;

class GeneratorNotFoundException extends PhpInvariantException
{
    public static function notFoundForType(string $typeName): self
    {
        return new self(sprintf('can not find generator for type %s', $typeName));
    }

    public static function notImplementInterface(string $generatorName): self
    {
        return new self(sprintf('generator %s must implement GeneratorInterface', $generatorName));
    }

}
