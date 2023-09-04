<?php

namespace PhpInvariant\Generator;



class Provider
{
    public function integer($min, $max): IntegerGenerator
    {
        return new IntegerGenerator($min, $max);
    }

    public function boolean():BooleanGenerator
    {
        return new BooleanGenerator();
    }

    public function float($min, $max): FloatGenerator
    {
        return new FloatGenerator($min, $max);
    }
}
