<?php

namespace PhpInvariant\Invariants\examples\generators\String;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class UnicodeStringInvariant extends BaseInvariant
{
    #[FinishRuns(2)]
    public function checkString()
    {
        $str = $this->provider->string(5, 10)->unicode()->get();
        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(mb_strlen($str), 10);
        $this->assertGreaterOrEqual(mb_strlen($str), 5);
    }
}
