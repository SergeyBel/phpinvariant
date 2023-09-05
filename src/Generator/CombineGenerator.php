<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

class CombineGenerator extends Random implements GeneratorInterface
{
    private array $generators;

    /**
     * @param array $generators
     */
    public function __construct(array $generators)
    {
        $this->generators = $generators;
    }


    public function get(): mixed
    {
        $generator = $this->getArrayElement($this->generators);
        return $generator->get();
    }


}
