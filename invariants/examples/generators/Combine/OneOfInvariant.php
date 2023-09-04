<?php

namespace PhpInvariant\Invariants\examples\generators\Combine;

use DateTime;
use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Combine\OneOfType;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use PhpInvariant\Generator\Type\String\StringType;

class OneOfInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkFromArray() {
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
