<?php

namespace PhpInvariant\Invariants\examples\generators\Combine;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Combine\OneOfType;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use PhpInvariant\Generator\Type\Scalar\StringType;
use DateTime;

class OneOfInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkFromArray(
        #[OneOfType([new StringType(1, 10), new DateTimeType()])]
        string | DateTime $value
    ) {
        if (is_string($value)) {
            $this->assertLessOrEqual(strlen($value), 10);
            return;
        }


        $this->assertInstanceOf($value, DateTime::class);
    }

}
