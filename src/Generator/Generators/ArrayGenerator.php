<?php

namespace PhpInvariant\Generator\Generators;

use PhpInvariant\Random\Random;

class ArrayGenerator extends Random implements GeneratorInterface
{
    private int $count;
    private GeneratorInterface $value;

    private ?GeneratorInterface $key = null;
    private int $depth = 1;


    public function __construct(int $count, GeneratorInterface $generator)
    {
        $this->count = $count;
        $this->value = $generator;
    }


    /**
     * @return array<mixed>
     */
    public function get(): array
    {
        if (!is_null($this->key)) {
            return $this->recursiveGenerate([], $this->depth);
        }

        $data = [];
        for ($i = 0; $i < $this->count; $i++) {
            $data[] = $this->value->get();
        }

        return $data;

    }



    public function key(GeneratorInterface $key): self
    {
        $this->key = $key;
        return $this;
    }

    public function depth(int $depth): self
    {
        $this->depth = $depth;
        return $this;
    }

    /**
     * @param array<mixed> $current
     * @return array<mixed>
     */
    private function recursiveGenerate(array $current, int $depth): array
    {

        $data = [];
        for ($i = 0; $i < $this->count; $i++) {
            if ($depth === 0) {
                $value = $this->value->get();
            } else {
                $value = $this->recursiveGenerate($current, $depth - 1);
            }


            $data[$this->key->get()] = $value;

        }

        return $data;
    }


}
