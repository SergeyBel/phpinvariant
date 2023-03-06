<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Scalar\IntegerGenerator;

class FinishCountCheck extends BaseInvariantCheck
{
    #[FinishCount(2)]
    public function checkFalse(#[IntegerGenerator(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
