<?php

namespace PhpInvariant\Invariants\examples\generators\String;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\String\UnicodeStringType;

class UnicodeStringInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkString(#[UnicodeStringType(5, 10)] string $str)
    {
        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(mb_strlen($str), 10);
        $this->assertGreaterOrEqual(mb_strlen($str), 5);
    }
}
