<?php

namespace PhpInvariant\Invariants\examples\generators\Boolean;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class BooleanInvariant extends BaseInvariant
{
    #[FinishRuns(2)]
    public function checkFloat()
    {
        $x = $this->provider->boolean()->get();

        $this->assertTrue(is_bool($x));
    }
}
