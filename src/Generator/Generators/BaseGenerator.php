<?php

namespace PhpInvariant\Generator\Generators;

use PhpInvariant\Random\Random;
use PhpInvariant\Registrator\ParametersRegistrator;

abstract class BaseGenerator extends Random implements GeneratorInterface
{
    protected function register(mixed $value): void
    {
        $trace = debug_backtrace();
        $file = $trace[1]['file'];
        if (str_ends_with($file, 'Invariant.php')) {
            ParametersRegistrator::add($value);
        }

    }

}
