<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Scalar\IntegerType;

class FinishCountInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkFalse(#[IntegerType(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
