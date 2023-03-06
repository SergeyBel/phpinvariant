<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Scalar\FloatGenerator;

class FloatTest extends BaseInvariantTest
{
    #[FinishCount(2)]
    public function testFloat(#[FloatGenerator(1, 10, 2)] float $x)
    {
        $this->assertTrue(is_float($x));
    }
}
