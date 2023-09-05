<?php

namespace PhpInvariant\MethodParser;

use PhpInvariant\Finish\FinishInterface;
use PhpInvariant\MethodParser\Exception\MethodParseException;
use ReflectionMethod;

class CheckMethodParser
{
    public function getFinishCondition(ReflectionMethod $method): FinishInterface
    {
        $attributes = $method->getAttributes();
        if (count($attributes) !== 1) {
            throw MethodParseException::methodAttributesIncorrect($method->getName());
        }

        $finish = $attributes[0]->newInstance();

        if (! ($finish instanceof FinishInterface)) {
            throw MethodParseException::parameterAttributesIncorrect($method->getName());

        }
        return $finish;
    }
}
