<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Arrays\ArraySubsetType;

class ArraySubsetCheck extends BaseInvariantCheck
{
    #[FinishCount(5)]
    public function checkSubset(#[ArraySubsetType([10, 20, 30, 40], 2)] array $elements)
    {
        $this->assertCount($elements, 2);
        foreach ($elements as $element) {
            $this->assertTrue(in_array($element, [10, 20, 30, 40]));
        }
    }
}
