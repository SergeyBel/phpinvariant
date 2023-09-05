<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class AssociativeArrayInvariant extends BaseInvariant
{
    #[FinishRuns(5)]
    public function checkAssociativeArray()
    {

        $associativeArray = $this->provider
            ->array(10, $this->provider->integer(1, 10))
            ->key($this->provider->string(2, 3))
            ->depth(1)
            ->get();


        $this->assertSame(count($associativeArray), 10);
        foreach ($associativeArray as $key => $value) {
            $this->assertGreaterOrEqual(strlen($key), 1);
            $this->assertLessOrEqual(strlen($key), 10);
            $this->assertTrue(is_array($value));
        }
    }

}
