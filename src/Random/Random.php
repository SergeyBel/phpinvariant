<?php

namespace PhpInvariant\Random;

class Random
{
    public function getInt(int $min, int $max): int
    {
        return random_int($min, $max);
    }

    public function seed(int $seed): void
    {
        srand($seed);
    }
}
