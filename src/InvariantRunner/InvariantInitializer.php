<?php

namespace PhpInvariant\InvariantRunner;

use PhpInvariant\BaseInvariant\BaseInvariant;

class InvariantInitializer
{
    public function initialize(BaseInvariant $invariant): void
    {
        $invariant->configure();
    }

}
