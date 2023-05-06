<?php

namespace PhpInvariant\Invariants\examples\generators\DateTime;

use PhpInvariant\BaseCheck\BaseInvariantCheck;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use DateTimeImmutable;

class DateTimeCheck extends BaseInvariantCheck
{
    #[FinishCount(5)]
    public function checkDateTime(#[DateTimeType(before: new DateTimeImmutable())] DateTimeImmutable $time)
    {
        $this->assertLessThanEqual($time->getTimestamp(), time());
    }
}
