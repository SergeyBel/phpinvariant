<?php

namespace PhpInvariant\Config\Exception;

use PhpInvariant\Exception\PhpInvariantException;

class ConfigParseException extends PhpInvariantException
{
    public static function canNotDetectRunMode(): self
    {
        return new  self('\'path\' or \'config\' parameter must be set');
    }

    public static function yamlNotParsed(string $message): self
    {
        return new self($message);
    }

    public static function parametersNotSet(): self
    {
        return new self('\'parameters:\' not set in yml config');
    }

    public static function pathNotSet(): self
    {
        return new self('\'path\' parameter');
    }
}
