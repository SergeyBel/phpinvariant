<?php

namespace PhpInvariant\Generator\Generator\Arrays;

use PhpInvariant\Generator\Generator\Integer\IntegerGenerator;
use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Generator\Type\Arrays\AssociativeArrayType;

class AssociativeArrayGenerator
{
    public function __construct(
        private GeneratorFactory $generatorFactory,
        private IntegerGenerator $integerGenerator
    ) {
    }

    /**
     * @return array<mixed>
     */
    public function __invoke(AssociativeArrayType $type): array
    {
        $depth = call_user_func($this->integerGenerator, $type->depth);
        return $this->recursiveGenerate([], $type, $depth);
    }

    /**
     * @param array<mixed> $current
     * @return array<mixed>
     */
    private function recursiveGenerate(array $current, AssociativeArrayType $type, int $depth): array
    {
        $count = call_user_func($this->integerGenerator, $type->count);
        $keyGenerator = $this->generatorFactory->getGenerator($type->key);
        $valueGenerator = $this->generatorFactory->getGenerator($type->value);

        $data = [];
        for ($i = 0; $i < $count; $i++) {
            if ($depth === 0) {
                $value = $valueGenerator($type->value);
            } else {
                $value = $this->recursiveGenerate($current, $type, $depth - 1);
            }


            $data[$keyGenerator($type->key)] = $value;

        }

        return $data;
    }


}
