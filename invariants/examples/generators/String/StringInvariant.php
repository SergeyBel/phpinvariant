<?php

namespace PhpInvariant\Invariants\examples\generators\String;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\String\StringType;

class StringInvariant extends BaseInvariant
{
    #[FinishCount(2)]
    public function checkString()
    {
        $str = $this->provider->string(5, 10)->dictionary(['a', 'b', 'c'])->get();
        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(strlen($str), 10);
        $this->assertGreaterOrEqual(strlen($str), 5);
    }
}
