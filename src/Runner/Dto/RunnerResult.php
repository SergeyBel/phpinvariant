<?php

namespace PhpInvariant\Runner\Dto;

use PhpInvariant\TestMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\TestRunner\Dto\TestRunResult;

class RunnerResult
{
    public int $time;
    public int $memory;
    public int $runsCount = 0;
    public int $testCount = 0;
    /** @var ErrorRunResult[] */
    public array $errorRuns = [];

    public function addTestResult(TestRunResult $testRunResult): static
    {
        $this->runsCount = $testRunResult->getRunsCount();
        $this->testCount++;
        $this->errorRuns = $testRunResult->getErrorRuns();
        return $this;
    }


    public function getRunsCount(): int
    {
        return $this->runsCount;
    }

    public function getSuccessRunsCount(): int
    {
        return $this->runsCount - $this->getErrorsCount();
    }


    public function getErrorsCount(): int
    {
        return count($this->errorRuns);
    }

    public function hasErrors(): bool
    {
        return !empty($this->errorRuns);
    }


    /**
     * @return ErrorRunResult[]
     */
    public function getErrorRuns(): array
    {
        return $this->errorRuns;
    }
    public function getTestCount(): int
    {
        return $this->testCount;
    }
}
