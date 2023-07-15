<?php

namespace PhpInvariant\Invariants\examples\generators\String;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\String\PrintableStringType;

class PrintableStringInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkString(#[PrintableStringType(5, 10)] string $str)
    {
        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(strlen($str), 10);
        $this->assertGreaterOrEqual(strlen($str), 5);
    }
}
