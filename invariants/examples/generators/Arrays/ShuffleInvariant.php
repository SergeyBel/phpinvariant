<?php

namespace PhpInvariant\Invariants\examples\generators\Arrays;

use PhpInvariant\BaseInvariant\BaseInvariant;
use PhpInvariant\Finish\FinishRuns;

class ShuffleInvariant extends BaseInvariant
{
    #[FinishRuns(2)]
    public function checkShuffle()
    {
        $data = $this->provider->shuffle(['a', 'b', 'c'])->get();

        $this->assertCount($data, 3);
        $this->assertInArray('a', $data);
        $this->assertInArray('b', $data);
        $this->assertInArray('c', $data);

    }

}
