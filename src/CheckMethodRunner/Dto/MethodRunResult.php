<?php

namespace PhpInvariant\CheckMethodRunner\Dto;

class MethodRunResult
{
    private int $runsCount = 0;
    /** @var ErrorRunResult[] */
    private array $errorRuns = [];

    public function incrementRunCount(): static
    {
        $this->runsCount++;
        return $this;
    }

    /**
     * @param ErrorRunResult[] $errorRuns
     * @return $this
     */
    public function setErrorRuns(array $errorRuns): static
    {
        $this->errorRuns = $errorRuns;
        return $this;
    }
    public function getRunsCount(): int
    {
        return $this->runsCount;
    }

    /**
     * @return ErrorRunResult[]
     */
    public function getErrorRuns(): array
    {
        return $this->errorRuns;
    }
}
