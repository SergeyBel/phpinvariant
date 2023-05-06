<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishTime;
use PhpInvariant\Generator\Type\Scalar\IntegerType;

class FinishTimeCheck extends BaseInvariantCheck
{
    #[FinishTime(1)]
    public function checkFalse(#[IntegerType(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
        $this->assertLessOrEqual($x, 100);
    }
}
