<?php

namespace PhpInvariant\Generator\Generator\Arrays;

use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Generator\Type\Arrays\VectorType;
use PhpInvariant\Generator\TypeInterface;

class VectorGenerator implements GeneratorInterface
{
    public function __construct(
        private GeneratorFactory $generatorFactory
    ) {
    }

    /**
     * @param VectorType $type
     * @return array<mixed>
     */
    public function generate(TypeInterface $type): array
    {
        $generator = $this->generatorFactory->getGenerator($type->elementType);
        $data = [];
        for ($i = 0; $i < $type->count; $i++) {
            $data[] = $generator->generate($type->elementType);
        }
        return $data;
    }


}
