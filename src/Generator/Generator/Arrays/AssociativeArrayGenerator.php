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
        $count = call_user_func($this->integerGenerator, $type->count);
        $keyGenerator = $this->generatorFactory->getGenerator($type->key);
        $valueGenerator = $this->generatorFactory->getGenerator($type->value);

        $data = [];
        for ($i = 0; $i < $count; $i++) {
            $data[call_user_func($keyGenerator, $type->key)] = call_user_func($valueGenerator, $type->value);

        }

        return $data;
    }


}
