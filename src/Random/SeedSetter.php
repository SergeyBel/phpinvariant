<?php

namespace PhpInvariant\Random;

class SeedSetter
{
    public function setSeed(int $seed): void
    {
        srand($seed);
    }

}
