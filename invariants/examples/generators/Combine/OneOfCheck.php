<?php

namespace PhpInvariant\Invariants\examples\generators\Combine;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Combine\OneOfType;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use PhpInvariant\Generator\Type\Scalar\StringType;
use DateTime;

class OneOfCheck extends BaseInvariantCheck
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
