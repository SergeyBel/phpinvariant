<?php

namespace PhpInvariant\Generator\Generator\Arrays;

use PhpInvariant\Generator\Type\Arrays\FromArrayType;
use PhpInvariant\Random\Random;

class FromArrayGenerator
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @return array<mixed>
     */
    public function __invoke(FromArrayType $type): array
    {
        $result = [];
        for ($i = 0; $i < $type->count; $i++) {
            $result[] = $type->data[$this->random->getInt(0, count($type->data) - 1)];
        }

        return $result;
    }
}
