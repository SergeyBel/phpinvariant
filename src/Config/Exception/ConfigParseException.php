<?php

namespace PhpInvariant\Config\Exception;

use PhpInvariant\Exception\PhpInvariantException;

class ConfigParseException extends PhpInvariantException
{
    public static function becauseYamlNotParsed(string $message): self
    {
        return new self($message);
    }

    public static function becauseParametersNotSet(): self
    {
        return new self('\'parameters:\' not set in yml config');
    }

    public static function becausePathNotSet(): self
    {
        return new self('\'path\' parameter not set');
    }
}
