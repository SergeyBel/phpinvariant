<?php

namespace PhpInvariant\Generator\Generator\Arrays;

use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\Type\Arrays\ArrayElementType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class ArrayElementGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param ArrayElementType $type
     * @return array<mixed>
     */
    public function generate(TypeInterface $type): array
    {
        $result = [];
        for ($i = 0; $i < $type->count; $i++) {
            $result[] = $type->data[$this->random->getInt(0, count($type->data) - 1)];
        }

        return $result;
    }
}
