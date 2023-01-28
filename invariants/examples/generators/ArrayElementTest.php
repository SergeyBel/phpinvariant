<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\ArrayElementGenerator;

class ArrayElementTest extends BaseInvariantTest
{
    #[FinishCount(5)]
    public function testFloat(#[ArrayElementGenerator([10, 20, 30, 40])] int $element)
    {
        $this->assertTrue($element > 0);
    }
}
