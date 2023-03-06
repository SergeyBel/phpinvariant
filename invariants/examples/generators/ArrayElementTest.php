<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Collection\ArrayElementGenerator;

class ArrayElementTest extends BaseInvariantTest
{
    #[FinishCount(5)]
    public function testFloat(#[ArrayElementGenerator([10, 20, 30, 40])] int $element)
    {
        $this->assertTrue(in_array($element, [10, 20, 30, 40]));
    }
}
