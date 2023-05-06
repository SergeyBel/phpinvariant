<?php

namespace PhpInvariant\Invariants\examples;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Scalar\IntegerType;

class SimpleCheck extends BaseInvariantCheck
{
    #[FinishCount(10)]
    public function checkSimple(#[IntegerType(99, 101)] int $x)
    {
        // fail when $x=101
        $this->assertTrue($x < 100);
    }
}
