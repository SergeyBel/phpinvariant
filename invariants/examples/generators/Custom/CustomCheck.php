<?php

namespace PhpInvariant\Invariants\examples\generators\Custom;

use Custom\CustomType;
use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;

class CustomCheck extends BaseInvariantCheck
{
    #[FinishCount(5)]
    public function checkCustom(#[CustomType('prefix')] string $str)
    {
        $this->assertStartsWith($str, 'prefix');
    }
}
