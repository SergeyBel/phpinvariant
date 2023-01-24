<?php

namespace PhpInvariant\Invariants;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\IntegerGenerator;

class FinishCountTest extends BaseInvariantTest
{
    #[FinishCount(2)]
    public function testFalse(#[IntegerGenerator(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
