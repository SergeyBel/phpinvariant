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
    }
}
