<?php

namespace PhpInvariant\Invariants\examples\generators\Scalar;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Boolean\BooleanType;

class BooleanInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkFloat(#[BooleanType()] bool $x)
    {
        $this->assertTrue(is_bool($x));
    }
}
