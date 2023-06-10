<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Arrays\VectorType;
use PhpInvariant\Generator\Type\Scalar\StringType;

class VectorInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkFromArray(#[VectorType(3, new StringType(5, 10))] array $elements)
    {
        $this->assertCount($elements, 3);
        foreach ($elements as $element) {
            $this->assertTrue(is_string($element));
            $this->assertTrue(strlen($element) >= 5);
            $this->assertTrue(strlen($element) <= 10);
        }
    }

}
