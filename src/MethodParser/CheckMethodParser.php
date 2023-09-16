<?php

namespace PhpInvariant\MethodParser;

use PhpInvariant\MethodParser\Exception\MethodParseException;
use ReflectionMethod;

class CheckMethodParser
{
    public function getFinishCondition(ReflectionMethod $method): object
    {
        $attributes = $method->getAttributes();
        if (count($attributes) !== 1) {
            throw MethodParseException::methodAttributesIncorrect($method->getName());
        }

        $finish = $attributes[0]->newInstance();

        return $finish;
    }
}
