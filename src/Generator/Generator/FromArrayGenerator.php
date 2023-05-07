<?php

namespace PhpInvariant\Generator\Generator;

use PhpInvariant\Generator\Type\Arrays\FromArrayType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class FromArrayGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param FromArrayType $type
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
