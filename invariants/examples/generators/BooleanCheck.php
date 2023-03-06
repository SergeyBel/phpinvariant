<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Scalar\BooleanGenerator;

class BooleanCheck extends BaseInvariantCheck
{
    #[FinishCount(5)]
    public function checkFloat(#[BooleanGenerator()] bool $x)
    {
        $this->assertTrue(is_bool($x));
    }
}
