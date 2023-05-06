<?php

namespace PhpInvariant\MethodParser;

use PhpInvariant\Finish\FinishInterface;
use PhpInvariant\Generator\TypeInterface;
use ReflectionMethod;

class CheckMethodParser
{
    /**
     * @return array<TypeInterface>
     */
    public function getParametersTypes(ReflectionMethod $method): array
    {
        $types = [];

        foreach ($method->getParameters() as $parameter) {
            $attributes = $parameter->getAttributes();
            $types[] = ($attributes[0])->newInstance();
        }

        return $types;
    }

    public function getFinishCondition(ReflectionMethod $method): FinishInterface
    {
        $attributes = $method->getAttributes();
        return $attributes[0]->newInstance();
    }
}
