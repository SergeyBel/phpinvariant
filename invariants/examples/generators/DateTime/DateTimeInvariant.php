<?php

namespace PhpInvariant\Invariants\examples\generators\DateTime;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use DateTime;

class DateTimeInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkDateTime(#[DateTimeType(before: new DateTime())] DateTime $time)
    {
        $this->assertLessOrEqual($time->getTimestamp(), time());
    }
}
