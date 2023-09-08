<?php

namespace PhpInvariant\Invariants\examples\generators\DateTime;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class DateTimeInvariant extends BaseInvariant
{
    #[FinishRuns(2)]
    public function checkDateTime()
    {
        $time = $this->provider->datetime()->get();

        $this->assertLessOrEqual($time->getTimestamp(), time());
    }
}
