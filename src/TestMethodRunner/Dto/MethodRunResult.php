<?php

namespace PhpInvariant\TestMethodRunner\Dto;

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
     * @return $this
     */
    public function addErrorRun(string $testName, string $methodName, string $message, string $trace): static
    {
        $this->errorRuns[] = new ErrorRunResult(
            $testName,
            $methodName,
            $message,
            $trace
        );
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
