<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Scalar\IntegerGenerator;

class FinishCountTest extends BaseInvariantTest
{
    #[FinishCount(2)]
    public function testFalse(#[IntegerGenerator(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
