<?php

namespace PhpInvariant\Generator\Generator\Combine;

use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\GeneratorFactory;
use PhpInvariant\Generator\Type\Combine\OneOfType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class OneOfGenerator implements GeneratorInterface
{
    public function __construct(
        private GeneratorFactory $generatorFactory,
        private Random $random
    ) {
    }

    /**
     * @param OneOfType $type
     */
    public function generate(TypeInterface $type): mixed
    {
        $data = $type->types;
        $type = $data[$this->random->getInt(0, count($data) - 1)];
        $generator = $this->generatorFactory->getGenerator($type);
        return $generator->generate($type);

    }
}
