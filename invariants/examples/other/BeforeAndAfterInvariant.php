<?php

namespace PhpInvariant\Invariants\examples\other;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class BeforeAndAfterInvariant extends BaseInvariant
{
    private $x = false;

    public function before()
    {
        $this->x = true;

    }

    public function after()
    {
        $this->x = false;
    }


    #[FinishRuns(1)]
    public function checkTrue()
    {
        $this->assertTrue($this->x);
    }
}
