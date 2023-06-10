<?php

namespace PhpInvariant\Invariants\examples\generators\Scalar;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class StringInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkString(#[\PhpInvariant\Generator\Type\Scalar\String\StringType(5, 10)] string $str)
    {
        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(strlen($str), 10);
        $this->assertGreaterOrEqual(strlen($str), 5);
    }
}
