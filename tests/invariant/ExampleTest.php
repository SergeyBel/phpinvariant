<?php

namespace PhpInvariant\Tests\invariant;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Generator\IntegerGenerator;
use PhpInvariant\Finish\FinishCount;

class ExampleTest extends BaseInvariantTest
{
    #[FinishCount(2)]
    public function testFalse(#[IntegerGenerator(0, 100)] int $x)
    {
        $this->assertTrue($x < 0);
    }
}
