<?php

namespace PhpInvariant\BaseInvariant;

use PhpInvariant\Generator\Provider;

abstract class BaseInvariant extends Asserts
{
    protected Provider $provider;


    public function configure(): self
    {
        $this->provider = new Provider();
        return $this;
    }

}
