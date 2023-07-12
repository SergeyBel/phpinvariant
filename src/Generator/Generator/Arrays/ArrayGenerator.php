<?php

namespace PhpInvariant\Generator\Generator\Arrays;

use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Generator\Type\Arrays\ArrayType;

class ArrayGenerator
{
    public function __construct(
        private GeneratorFactory $generatorFactory
    ) {
    }

    /**
     * @return array<mixed>
     */
    public function __invoke(ArrayType $type): array
    {
        $generator = $this->generatorFactory->getGenerator($type->elementType);
        $data = [];
        for ($i = 0; $i < $type->count; $i++) {
            $data[] = $generator($type->elementType);
        }
        return $data;
    }



}
