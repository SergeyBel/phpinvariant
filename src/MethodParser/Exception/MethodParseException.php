<?php

namespace PhpInvariant\MethodParser\Exception;

use PhpInvariant\Exception\PhpInvariantException;

class MethodParseException extends PhpInvariantException
{
    public static function parameterAttributesIncorrect(string $parameterName): self
    {
        return new self(sprintf("attribute for parameter '%s' not set", $parameterName));
    }

    public static function methodAttributesIncorrect(string $methodName): self
    {
        return new self(sprintf("finish attribute for method '%s' not set", $methodName));
    }

}
