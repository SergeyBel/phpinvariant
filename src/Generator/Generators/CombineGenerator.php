<?php

namespace PhpInvariant\Generator\Generators;

class CombineGenerator extends BaseGenerator
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
