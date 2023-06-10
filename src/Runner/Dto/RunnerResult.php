<?php

namespace PhpInvariant\Runner\Dto;

use PhpInvariant\CheckMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\CheckRunner\Dto\CheckRunResult;

class RunnerResult
{
    public function __construct(
        public ActualConfiguration $configuration,
        public int $runsCount = 0,
        public int $checkCount = 0,
        /** @var ErrorRunResult[] */
        public  array $errorRuns = []
    ) {
    }


    public function addCheckResult(CheckRunResult $checkRunResult): static
    {
        $this->runsCount += $checkRunResult->getRunsCount();
        $this->checkCount++;
        $this->errorRuns = array_merge($this->errorRuns, $checkRunResult->getErrorRuns());
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
    public function getCheckCount(): int
    {
        return $this->checkCount;
    }
}
