<?php

namespace PhpInvariant\Generator\Generators;

use PhpInvariant\Random\Random;

class ElementsGenerator extends Random implements GeneratorInterface
{
    /**
     * @var array<mixed>
     */
    private array $data;
    private int $count;


    /**
     * @param array<mixed> $data
     */
    public function __construct(array $data, int $count)
    {
        $this->data = $data;
        $this->count = $count;
    }

    /**
     * @return array<mixed>
     */
    public function get(): array
    {
        $elements = [];
        for ($i = 0; $i < $this->count; $i++) {
            $elements[] = $this->getArrayElement($this->data);
        }

        return $elements;
    }


}
