<?php

namespace PhpInvariant\Invariants\examples\generators\Float;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class FloatInvariant extends BaseInvariant
{
    #[FinishRuns(2)]
    public function checkFloat()
    {
        $x = $this->provider->float(1, 10)->decimals(2)->get();
        $this->assertTrue(is_float($x));
        $this->assertLessOrEqual($x, 10);
        $this->assertGreaterOrEqual($x, 1);
    }
}
