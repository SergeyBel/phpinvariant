<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;

class ElementsGenerator extends Random implements GeneratorInterface
{
    private array $data;
    private int $count;

    /**
     * @param array $data
     */
    public function __construct(array $data, int $count)
    {
        $this->data = $data;
        $this->count = $count;
    }

    public function get(): array
    {
        $elements = [];
        for ($i = 0; $i < $this->count; $i++)
        {
            $elements[] = $this->getArrayElement($this->data);
        }

        return $elements;
    }


}
