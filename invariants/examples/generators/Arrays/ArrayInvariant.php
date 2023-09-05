<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class ArrayInvariant extends BaseInvariant
{
    #[FinishRuns(5)]
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
