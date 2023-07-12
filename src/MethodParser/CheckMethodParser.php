<?php

namespace PhpInvariant\MethodParser;

use PhpInvariant\Finish\FinishInterface;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\MethodParser\Exception\MethodParseException;
use ReflectionMethod;

class CheckMethodParser
{
    /**
     * @return array<TypeInterface>
     * @throws MethodParseException
     */
    public function getParametersTypes(ReflectionMethod $method): array
    {
        $types = [];

        foreach ($method->getParameters() as $parameter) {
            $attributes = $parameter->getAttributes();
            if (count($attributes) !== 1) {
                throw MethodParseException::parameterAttributesIncorrect($parameter->getName());
            }
            $type = ($attributes[0])->newInstance();
            if (! ($type instanceof TypeInterface)) {
                throw MethodParseException::parameterAttributesIncorrect($parameter->getName());

            }
            $types[] = $type;
        }

        return $types;
    }

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
