<?php

namespace PhpInvariant\Invariants\examples\generators;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\StringGenerator;

class StringTest extends BaseInvariantTest
{
    #[FinishCount(2)]
    public function testString(#[StringGenerator(5, 10)] string $str)
    {
        $this->assertTrue(is_string($str) && strlen($str) > 4);
    }
}
