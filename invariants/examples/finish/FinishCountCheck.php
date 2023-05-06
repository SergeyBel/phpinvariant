<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Scalar\IntegerType;

class FinishCountCheck extends BaseInvariantCheck
{
    #[FinishCount(2)]
    public function checkFalse(#[IntegerType(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
