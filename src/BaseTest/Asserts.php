<?php

namespace PhpInvariant\BaseTest;

use PhpInvariant\BaseTest\Exception\PhpInvariantAssertException;
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
