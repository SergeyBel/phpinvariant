<?php

namespace PhpInvariant\Finish;

use Attribute;

#[Attribute]
class FinishCount implements FinishInterface
{
    private int $count;


    public function __construct(int $count)
    {
        $this->count = $count;
    }


    public function getCount(): int
    {
        return $this->count;
    }
}
