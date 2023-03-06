<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishTime;
use PhpInvariant\Generator\Scalar\IntegerGenerator;

class FinishTimeCheck extends BaseInvariantCheck
{
    #[FinishTime(5)]
    public function checkFalse(#[IntegerGenerator(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
