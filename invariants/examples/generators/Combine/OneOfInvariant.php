<?php

namespace PhpInvariant\Invariants\examples\generators\Combine;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class OneOfInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkFromArray()
    {
        $value = $this->provider->combine(
            [
                [0.5, $this->provider->string(1, 10)],
                [0.5,  $this->provider->integet(1, 10)]
            ]
        );

        if (is_string($value)) {
            $this->assertLessOrEqual(strlen($value), 10);
            return;
        }

        $this->assertTrue(is_integer($value));
        $this->assertGreaterOrEqual(1, $value);
        $this->assertLessOrEqual(10, $value);
    }

}
