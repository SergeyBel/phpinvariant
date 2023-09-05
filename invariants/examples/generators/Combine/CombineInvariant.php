<?php

namespace PhpInvariant\Invariants\examples\generators\Combine;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class CombineInvariant extends BaseInvariant
{
    #[FinishRuns(5)]
    public function checkFromArray()
    {
        $value = $this->provider->combine(
            [
                $this->provider->string(1, 10),
                $this->provider->integer(1, 10)
            ]
        )->get();


        if (is_string($value)) {
            $this->assertLessOrEqual(strlen($value), 10);
            return;
        }

        $this->assertTrue(is_integer($value));
        $this->assertGreaterOrEqual($value, 1);
        $this->assertLessOrEqual($value, 10);
    }

}
