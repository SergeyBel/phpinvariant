<?php

namespace PhpInvariant\Finish;

use Attribute;

#[Attribute]
class FinishSeconds implements FinishInterface
{
    private int $seconds;


    public function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }


    public function getSeconds(): int
    {
        return $this->seconds;
    }
}
