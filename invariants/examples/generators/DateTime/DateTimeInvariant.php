<?php

namespace PhpInvariant\Invariants\examples\generators\DateTime;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishCount;

class DateTimeInvariant extends BaseInvariant
{
    #[FinishCount(5)]
    public function checkDateTime()
    {
        $time = $this->provider->datetime()->get();
        $this->assertLessOrEqual($time->getTimestamp(), time());
    }
}
