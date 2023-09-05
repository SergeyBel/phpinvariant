<?php

namespace PhpInvariant\Random;

class Random
{
    public function getInt(int $min, int $max): int
    {
        return random_int($min, $max);
    }

    /**
     * @param array<mixed> $data
     */
    public function getArrayElement(array $data): mixed
    {
        $keys = array_keys($data);
        $key = $keys[$this->getInt(0, count($keys) - 1)];
        return $data[$key];
    }
}
