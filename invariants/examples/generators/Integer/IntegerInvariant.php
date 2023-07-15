<?php

namespace PhpInvariant\Invariants\examples\generators\Integer;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Integer\IntegerType;

class IntegerInvariant extends BaseInvariant
{
    #[FinishCount(10)]
    public function checkInteger(#[IntegerType(50, 100)] int $x)
    {
        $this->assertTrue(is_integer($x));
        $this->assertLessOrEqual($x, 100);
        $this->assertGreaterOrEqual($x, 50);
    }
}
