<?php

namespace PhpInvariant\CheckMethodRunner;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\BaseInvariant\Exception\PhpInvariantAssertException;
use ReflectionMethod;

class InvariantClassExecutor
{
    /**
     * @throws PhpInvariantAssertException
     */
    public function executeCheckMethod(BaseInvariant $invariantClass, ReflectionMethod $checkMethod): void
    {
        $checkMethod->invoke($invariantClass);
    }

    public function executeBefore(BaseInvariant $invariantClass): void
    {
        $before = 'before';
        if (method_exists($invariantClass, $before)) {
            $invariantClass->{$before}();
        }

    }

    public function executeAfter(BaseInvariant $invariantClass): void
    {
        $after = 'after';
        if (method_exists($invariantClass, $after)) {
            $invariantClass->{$after}();
        }

    }

}
