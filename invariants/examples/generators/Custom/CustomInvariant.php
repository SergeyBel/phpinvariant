<?php

namespace PhpInvariant\Invariants\examples\generators\Custom;

use Custom\CustomType;
use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class CustomInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkCustom(#[CustomType('prefix')] string $str)
    {
        $this->assertStartsWith($str, 'prefix');
    }
}
