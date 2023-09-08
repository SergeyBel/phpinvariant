<?php

namespace PhpInvariant\Generator\Generators;

class ShuffleGenerator extends BaseGenerator
{
    /**
     * @var array<mixed>
     */
    private array $data;

    /**
     * @param mixed[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function get(): mixed
    {
        $shuffledData = $this->shuffle($this->data);

        $this->register($shuffledData);
        return $shuffledData;
    }


}
