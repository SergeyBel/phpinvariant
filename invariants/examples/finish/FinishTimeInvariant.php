<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishTime;
use PhpInvariant\Generator\Type\Integer\IntegerType;

class FinishTimeInvariant extends BaseInvariant
{
    #[FinishTime(1)]
    public function checkFalse(#[IntegerType(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
        $this->assertLessOrEqual($x, 100);
    }
}
