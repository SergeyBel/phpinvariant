<?php

namespace PhpInvariant\Invariants\examples\generators\Scalar;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Scalar\BooleanType;

class BooleanCheck extends BaseInvariantCheck
{
    #[FinishCount(5)]
    public function checkFloat(#[BooleanType()] bool $x)
    {
        $this->assertTrue(is_bool($x));
    }
}
