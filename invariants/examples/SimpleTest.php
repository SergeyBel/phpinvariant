<?php

namespace PhpInvariant\Invariants\examples;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\IntegerGenerator;

class SimpleTest extends BaseInvariantTest
{
    #[FinishCount(10)]
    public function testDivision(#[IntegerGenerator(99, 101)] int $x)
    {
        // fail when $x=101
        $this->assertTrue($x < 100);
    }
}
