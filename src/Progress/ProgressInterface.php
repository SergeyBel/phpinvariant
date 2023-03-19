<?php

namespace PhpInvariant\Progress;

interface ProgressInterface
{
    public function start(int $maxSteps): void;

    public function step(): void;

    public function finish(): void;
}
