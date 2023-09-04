<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Arrays\ArrayType;
use PhpInvariant\Generator\Type\Integer\IntegerType;
use PhpInvariant\Generator\Type\String\StringType;

class ArrayInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkArray()
    {
        $elements = $this->provider->array(3, $this->provider->string(5, 10)->ascii())->get();
        $this->assertCount($elements, 3);
        foreach ($elements as $element) {
            $this->assertTrue(is_string($element));
            $this->assertTrue(strlen($element) >= 5);
            $this->assertTrue(strlen($element) <= 10);
        }
    }

}
