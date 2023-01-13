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
    public function createParameters(array $parameters)
    {
        $generatedParameters = [];
        $generators = $this->getGenerators($parameters);

        foreach ($parameters as $key => $parameter) {
            if ($parameter->getName() === 'generators') {
                continue;
            }

            $generatedParameters[] = $generators[$key]->generate($this->random);
        }

        $generatedParameters[] = $generators;

        return $generatedParameters;
    }

    /**
     * @param ReflectionParameter[] $parameters
     */
    private function getGenerators(array $parameters): array
    {
        foreach ($parameters as $parameter) {
            if ($parameter->getName() === 'generators') {
                return $parameter->getDefaultValue();
            }
        }
    }
}
