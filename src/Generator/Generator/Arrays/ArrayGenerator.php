<?php

namespace PhpInvariant\Generator\Generator\Arrays;

use PhpInvariant\Generator\Generator\Integer\IntegerGenerator;
use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Generator\Type\Arrays\ArrayType;

class ArrayGenerator
{
    public function __construct(
        private GeneratorFactory $generatorFactory,
        private IntegerGenerator $integerGenerator
    ) {
    }

    /**
     * @return array<mixed>
     */
    public function __invoke(ArrayType $type): array
    {
        $count = call_user_func($this->integerGenerator, $type->count);
        $generator = $this->generatorFactory->getGenerator($type->elementType);
        $data = [];
        for ($i = 0; $i < $count; $i++) {
            $data[] = $generator($type->elementType);
        }
        return $data;
    }



}
