<?php

namespace PhpInvariant\Finish;

use Attribute;

#[Attribute]
class FinishRuns
{
    private int $runs;


    public function __construct(int $runs)
    {
        $this->runs = $runs;
    }


    public function getRuns(): int
    {
        return $this->runs;
    }
}
