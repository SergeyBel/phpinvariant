<?php

namespace PhpInvariant\Generator\Generator\Combine;

use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Generator\Type\Combine\OneOfType;
use PhpInvariant\Random\Random;

class OneOfGenerator
{
    public function __construct(
        private GeneratorFactory $generatorFactory,
        private Random $random
    ) {
    }


    public function __invoke(OneOfType $type): mixed
    {
        $data = $type->types;
        $type = $data[$this->random->getInt(0, count($data) - 1)];
        $generator = $this->generatorFactory->getGenerator($type);
        return $generator($type);

    }
}
