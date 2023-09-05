<?php

namespace PhpInvariant\Generator\Generators;

use PhpInvariant\Random\Random;

class CombineGenerator extends Random implements GeneratorInterface
{
    /**
      * @var array<GeneratorInterface>
      */
    private array $generators;


    /**
     * @param array<GeneratorInterface> $generators
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
