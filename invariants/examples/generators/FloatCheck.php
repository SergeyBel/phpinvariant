<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Scalar\FloatType;

class FloatCheck extends BaseInvariantCheck
{
    #[FinishCount(2)]
    public function checkFloat(#[FloatType(1, 10, 2)] float $x)
    {
        $this->assertTrue(is_float($x));
    }
}
