<?php

namespace PhpInvariant\MethodParser\Exception;

use PhpInvariant\Exception\PhpInvariantException;

class MethodParseException extends PhpInvariantException
{
    public static function becauseParameterAttributesIncorrect(string $parameterName): self
    {
        return new self(sprintf("attribute for parameter '%s' not set", $parameterName));
    }

    public static function becauseParameterAttributeNotImplementInterface(string $parameterName): self
    {
        return new self(sprintf("attribute for parameter '%s' must implement TypeInterface", $parameterName));
    }

    public static function becauseMethodAttributesIncorrect(string $methodName): self
    {
        return new self(sprintf("finish attribute for method '%s' not set", $methodName));
    }

    public static function becauseMethodAttributeNotImplementInterface(string $methodName): self
    {
        return new self(sprintf("finish attribute for method '%s' must implement FinishInterface", $methodName));
    }


}
