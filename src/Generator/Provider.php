<?php

namespace PhpInvariant\Generator;



class Provider
{
    public function integer($min, $max): IntegerGenerator
    {
        return new IntegerGenerator($min, $max);
    }
}
