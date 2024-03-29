<?php

namespace PhpInvariant\ClassFinder\Exception;

use PhpInvariant\Exception\PhpInvariantException;

class ClassExtractException extends PhpInvariantException
{
    public static function fileNotRead(string $filename): self
    {
        return new self(sprintf('Can not read file %s', $filename));
    }

}
