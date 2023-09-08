<?php

namespace PhpInvariant\Invariants\examples\generators\String;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class AlphanumericStringInvariant extends BaseInvariant
{
    #[FinishRuns(2)]
    public function checkString()
    {
        $str = $this->provider
                    ->string(5, 10)
                    ->alphanumeric()
                    ->get();

        $this->assertTrue(is_string($str));
        $this->assertLessOrEqual(strlen($str), 10);
        $this->assertGreaterOrEqual(strlen($str), 5);
    }
}
