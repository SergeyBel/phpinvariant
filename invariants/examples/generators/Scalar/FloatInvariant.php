<?php

namespace PhpInvariant\Invariants\examples\generators\Scalar;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Float\FloatType;

class FloatInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkFloat(#[FloatType(1, 10, 2)] float $x)
    {
        $this->assertTrue(is_float($x));
        $this->assertLessOrEqual($x, 10);
        $this->assertGreaterOrEqual($x, 1);
    }
}
