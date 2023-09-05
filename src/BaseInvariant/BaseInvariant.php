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


    /**
     * @return array<string>
     */
    public function getArgs(): array
    {
        return [];
    }


}
