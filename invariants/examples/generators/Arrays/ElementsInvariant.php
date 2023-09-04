<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Arrays\FromArrayType;

class ElementsInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkElements()
    {
        $elements = $this->provider->elements([10, 20, 30, 40], 2)->get();
        $this->assertCount($elements, 2);
        foreach ($elements as $element) {
            $this->assertTrue(in_array($element, [10, 20, 30, 40]));
        }
    }
}
