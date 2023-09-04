<?php

namespace PhpInvariant\Invariants\examples\generators\String;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\String\PrintableStringType;

class PrintableStringInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkString()
    {
        $str = $this->provider->string(5, 10)->alphabetic()->get();
        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(strlen($str), 10);
        $this->assertGreaterOrEqual(strlen($str), 5);
    }
}
