<?php

namespace PhpInvariant\Tests\invariant;

use PhpInvariant\BaseTest\BaseInvariantTest;
use PhpInvariant\Generator\IntegerGenerator;

class ExampleTest extends BaseInvariantTest
{
    public function falseTest(int $x, array $generators = [new IntegerGenerator(0, 100)])
    {
        $this->assertFalse($x < 0);
    }
}
