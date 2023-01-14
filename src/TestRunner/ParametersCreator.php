<?php

namespace PhpInvariant\TestRunner;

use PhpInvariant\Random\Random;
use ReflectionParameter;

class ParametersCreator
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param ReflectionParameter[] $parameters
     * @return array
     */
    public function createParameters(array $parameters)
    {
        $generatedParameters = [];

        foreach ($parameters as $parameter) {
            $attributes = $parameter->getAttributes();
            $generator = ($attributes[0])->newInstance();
            $generatedParameters[] = $generator->generate($this->random);
        }


        return $generatedParameters;
    }
}
