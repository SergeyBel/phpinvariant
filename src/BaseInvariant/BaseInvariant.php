<?php

namespace PhpInvariant\BaseInvariant;

use PhpInvariant\Generator\Provider;

abstract class BaseInvariant extends Asserts
{
    protected Provider $provider;


    public function configure()
    {
        $this->provider = new Provider();
    }


    public function getArgs()
    {
        return [];
    }


}
