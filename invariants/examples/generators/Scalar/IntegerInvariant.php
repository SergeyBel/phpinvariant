<?php

namespace PhpInvariant\Invariants\examples\generators\Scalar;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class IntegerInvariant extends BaseInvariant
{
    #[FinishCount(10)]
    public function checkInteger(#[\PhpInvariant\Generator\Type\Integer\IntegerType(50, 100)] int $x)
    {
        $this->assertTrue(is_integer($x));
        $this->assertLessOrEqual($x, 100);
        $this->assertGreaterOrEqual($x, 50);
    }
}
