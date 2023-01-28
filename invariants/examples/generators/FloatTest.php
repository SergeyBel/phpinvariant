<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\FloatGenerator;

class FloatTest extends BaseInvariantTest
{
    #[FinishCount(2)]
    public function testFloat(#[FloatGenerator(-10, 10, 2)] float $x)
    {
        $this->assertTrue($x < 0);
    }
}
