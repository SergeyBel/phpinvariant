<?php

namespace PhpInvariant\Invariants\examples\generators\Boolean;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class BooleanInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkFloat()
    {
        $x = $this->provider->boolean()->get();
        $this->assertTrue(is_bool($x));
    }
}
