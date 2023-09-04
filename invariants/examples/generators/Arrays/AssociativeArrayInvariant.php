<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class AssociativeArrayInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkAssociativeArray()
    {

        $associativeArray = $this->provider->array(10, $this->provider->string(50, 100))->key($this->provider->string(1, 10))->depth(2)->get();

        $this->assertSame(count($associativeArray), 10);
        foreach ($associativeArray as $key => $value) {
            $this->assertGreaterOrEqual(strlen($key), 1);
            $this->assertLessOrEqual(strlen($key), 10);
            $this->assertTrue(is_string($value));
        }
    }

}
