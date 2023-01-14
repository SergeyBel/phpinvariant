<?php

namespace PhpInvariant\Tests\invariant;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Generator\IntegerGenerator;

class ExampleTest extends BaseInvariantTest
{
    public function testFalse(#[IntegerGenerator(0, 100)] int $x)
    {
        $this->assertFalse($x < 0);
    }
}
