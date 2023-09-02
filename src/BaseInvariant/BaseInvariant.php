<?php

namespace PhpInvariant\BaseInvariant;

use PhpInvariant\Generator\Provider;

abstract class BaseInvariant extends Asserts
{
    protected Provider $provider;

    private mixed $args;

    public function configure()
    {
        $this->provider = new Provider();
    }

    public function debug(...$args)
    {
        $this->args = $args;
    }

    public function getArgs()
    {
        return $this->args;
    }


}
