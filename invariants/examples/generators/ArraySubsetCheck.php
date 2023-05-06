<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Arrays\ArraySubsetType;

class ArraySubsetCheck extends BaseInvariantCheck
{
    #[FinishCount(5)]
    public function checkFloat(#[ArraySubsetType([10, 20, 30, 40], 2)] array $elements)
    {
        $this->assertCount($elements, 2);
        $this->assertTrue(in_array($elements, [10, 20, 30, 40]));
    }
}
