<?php

namespace PhpInvariant\Invariants\examples\finish;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishTime;
use PhpInvariant\Generator\IntegerGenerator;

class FinishTimeTest extends BaseInvariantTest
{
    #[FinishTime(5)]
    public function testFalse(#[IntegerGenerator(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
