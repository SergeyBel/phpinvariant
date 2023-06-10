<?php

namespace PhpInvariant\Invariants\examples\generators\Scalar;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Scalar\StringType;

class StringInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkString(#[StringType(5, 10)] string $str)
    {
        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(strlen($str), 10);
        $this->assertGreaterOrEqual(strlen($str), 5);
    }
}