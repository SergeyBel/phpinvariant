<?php

namespace PhpInvariant\Finish;

use Attribute;

#[Attribute]
class FinishTime implements FinishInterface
{
    private int $secondsDelay;


    public function __construct(int $secondsDelay)
    {
        $this->secondsDelay = $secondsDelay;
    }


    public function getSecondsDelay(): int
    {
        return $this->secondsDelay;
    }
}
