<?php

namespace PhpInvariant\Invariants\examples\generators\Integer;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class IntegerInvariant extends BaseInvariant
{
    #[FinishRuns(10)]
    public function checkInteger()
    {
        $x = $this->provider->integer(50, 100)->get();


        $this->assertTrue(is_integer($x));
        $this->assertLessOrEqual($x, 100);
        $this->assertGreaterOrEqual($x, 50);
    }
}
