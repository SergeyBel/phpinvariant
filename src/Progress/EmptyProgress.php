<?php

namespace PhpInvariant\Progress;

class EmptyProgress implements ProgressInterface
{
    public function start(int $maxSteps): void
    {
    }

    public function step(): void
    {
        // TODO: Implement step() method.
    }

    public function finish(): void
    {
    }
}
