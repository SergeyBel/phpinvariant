<?php

namespace PhpInvariant\Generator\Generators;

class BooleanGenerator extends BaseGenerator
{
    public function get(): bool
    {
        $value = (bool)($this->getInt(0, 1));

        $this->register($value);
        return $value;
    }

}
