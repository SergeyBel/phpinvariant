<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\BooleanGenerator;

class BooleanTest extends BaseInvariantTest
{
    #[FinishCount(5)]
    public function testFloat(#[BooleanGenerator()] bool $x)
    {
        $this->assertTrue(is_bool($x));
    }
}
