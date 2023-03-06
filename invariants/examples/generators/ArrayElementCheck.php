<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Collection\ArrayElementGenerator;

class ArrayElementCheck extends BaseInvariantCheck
{
    #[FinishCount(5)]
    public function checkFloat(#[ArrayElementGenerator([10, 20, 30, 40])] int $element)
    {
        $this->assertTrue(in_array($element, [10, 20, 30, 40]));
    }
}
