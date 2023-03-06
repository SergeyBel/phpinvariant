<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Scalar\StringGenerator;

class StringCheck extends BaseInvariantCheck
{
    #[FinishCount(2)]
    public function checkString(#[StringGenerator(5, 10)] string $str)
    {
        $this->assertTrue(is_string($str) && strlen($str) > 4);
    }
}
