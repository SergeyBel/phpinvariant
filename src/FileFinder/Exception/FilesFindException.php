<?php

namespace PhpInvariant\FileFinder\Exception;

use PhpInvariant\Exception\PhpInvariantException;

class FilesFindException extends PhpInvariantException
{
    public static function becauseDirectoryNotFound(string $directory): self
    {
        return new self(sprintf('The "%s" directory does not exist', $directory));
    }

}
