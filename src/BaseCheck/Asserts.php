<?php

namespace PhpInvariant\BaseCheck;

use PhpInvariant\BaseCheck\Exception\PhpInvariantAssertException;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException;

class Asserts
{
    public function assertTrue(mixed $value): void
    {
        $this->wrap(fn () => Assert::true($value));
    }

    public function assertFalse(mixed $value): void
    {
        $this->wrap(fn () => Assert::false($value));
    }

    public function assertSame(mixed $expected, mixed $value): void
    {
        $this->wrap(fn () => Assert::same($value, $expected));
    }

    public function assertNotSame(mixed $expected, mixed $value): void
    {
        $this->wrap(fn () => Assert::notSame($value, $expected));
    }

    public function assertNull(mixed $value): void
    {
        $this->wrap(fn () => Assert::null($value));
    }

    public function assertInstanceOf(mixed $value, string $class): void
    {
        $this->wrap(fn () => Assert::isInstanceOf($value, $class));
    }

    public function assertLessThanEqual(mixed $value, mixed $limit): void
    {
        $this->wrap(fn () => Assert::lessThanEq($value, $limit));
    }



    /**
     * @param array<mixed> $array
     * @throws PhpInvariantAssertException
     */
    public function assertCount(array $array, int $number): void
    {
        $this->wrap(fn () => Assert::count($array, $number));
    }

    /**
     * @param array<mixed> $data
     * @throws PhpInvariantAssertException
     */
    public function assertArrayHasKey(int | string $key, array $data): void
    {
        if (!array_key_exists($key, $data)) {
            throw new PhpInvariantAssertException('key '. $key. 'not found in array');
        }
    }

    /**
     * @param array<mixed> $data
     * @throws PhpInvariantAssertException
     */
    public function assertInArray(mixed $value, array $data): void
    {
        if (!in_array($value, $data)) {
            throw new PhpInvariantAssertException('value '. $value. 'not found in array');
        }
    }



    /**
     * @throws PhpInvariantAssertException
     */
    private function wrap(callable $callable): void
    {
        try {
            $callable();
        } catch (InvalidArgumentException $e) {
            throw new PhpInvariantAssertException($e->getMessage());
        }
    }
}
