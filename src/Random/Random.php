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
    public function getValueFromArray(array $data): mixed
    {
        return $data[array_rand($data)];
    }

    /**
     * @param array<mixed> $data
     */
    public function getKeyFromArray(array $data): mixed
    {
        return $this->getValueFromArray(array_keys($data));
    }

    public function getBool(): bool
    {
        return $this->getInt(0, 1) === 1 ? true : false;
    }

    public function getSymbol(): string
    {
        $characters = '!"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyz{|}~';
        $position = $this->getInt(0, strlen($characters) - 1);
        return $characters[$position];
    }

    public function getString(int $length): string
    {
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $this->getSymbol();
        }
        return $str;
    }
}
