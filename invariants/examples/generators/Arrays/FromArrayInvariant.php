<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Arrays\FromArrayType;

class FromArrayInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkFromArray(#[FromArrayType([10, 20, 30, 40], 2)] array $elements)
    {
        $this->assertCount($elements, 2);
        foreach ($elements as $element) {
            $this->assertTrue(in_array($element, [10, 20, 30, 40]));
        }
    }
}
