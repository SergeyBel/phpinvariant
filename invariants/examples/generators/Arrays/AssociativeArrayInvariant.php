<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\Arrays\AssociativeArrayType;
use PhpInvariant\Generator\Type\Integer\IntegerType;
use PhpInvariant\Generator\Type\String\StringType;

class AssociativeArrayInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkAssociativeArray(
        #[AssociativeArrayType(
            new StringType(1, 10, ['a', 'b']),
            new IntegerType(100, 999),
            new IntegerType(3, 5),
            new IntegerType(2, 3),
        )] array $associativeArray
    ) {
        $this->assertGreaterOrEqual(count($associativeArray), 3);
        $this->assertLessOrEqual(count($associativeArray), 5);
        foreach ($associativeArray as $key => $value) {
            $this->assertGreaterOrEqual(strlen($key), 1);
            $this->assertLessOrEqual(strlen($key), 10);
            $this->assertTrue(is_array($value));
        }
    }

}
