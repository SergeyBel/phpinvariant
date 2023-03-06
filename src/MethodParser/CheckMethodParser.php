<?php

namespace PhpInvariant\MethodParser;

use PhpInvariant\Finish\FinishInterface;
use PhpInvariant\Generator\GeneratorInterface;
use ReflectionMethod;

class CheckMethodParser
{
    /**
     * @return array<GeneratorInterface>
     */
    public function getGenerators(ReflectionMethod $method): array
    {
        $generators = [];

        foreach ($method->getParameters() as $parameter) {
            $attributes = $parameter->getAttributes();
            $generators[] = ($attributes[0])->newInstance();
        }

        return $generators;
    }

    public function getFinishCondition(ReflectionMethod $method): FinishInterface
    {
        $attributes = $method->getAttributes();
        return $attributes[0]->newInstance();
    }
}
