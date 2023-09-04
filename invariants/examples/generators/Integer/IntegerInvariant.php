<?php

namespace PhpInvariant\Invariants\examples\generators\Integer;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class IntegerInvariant extends BaseInvariant
{

    #[FinishCount(10)]
    public function checkInteger()
    {
        $x = $this->provider->integer(50, 100)->get();

        $this->debug($x);

        $this->assertTrue(is_integer($x));
        $this->assertLessOrEqual($x, 100);
        $this->assertGreaterOrEqual($x, 50);
    }
}
