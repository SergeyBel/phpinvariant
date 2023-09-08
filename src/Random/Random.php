<?php

namespace PhpInvariant\Random;

class Random
{
    protected function getInt(int $min, int $max): int
    {
        return random_int($min, $max);
    }

    /**
     * @param array<mixed> $data
     */
    protected function getArrayElement(array $data): mixed
    {
        $keys = array_keys($data);
        $key = $keys[$this->getInt(0, count($keys) - 1)];
        return $data[$key];
    }

    /**
     * @param array<mixed> $data
     * @return array<mixed>
     */
    protected function shuffle(array $data): array
    {
        shuffle($data);
        return $data;

    }
}
