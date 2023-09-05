<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class FinishCountInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkInteger()
    {
        $x = $this->provider->integer(0, 100)->get();
        $this->assertFalse($x < 0);
        $this->assertLessOrEqual($x, 100);
    }
}
