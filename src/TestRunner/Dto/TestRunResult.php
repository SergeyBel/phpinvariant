<?php

namespace PhpInvariant\TestRunner\Dto;

use PhpInvariant\TestMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;

class TestRunResult
{
    private int $runsCount = 0;
    /** @var ErrorRunResult[] */
    private array $errorRuns = [];



    public function addMethodRunResult(MethodRunResult $methodRunResult): static
    {
        $this->runsCount += $methodRunResult->getRunsCount();
        $this->errorRuns = array_merge($this->errorRuns, $methodRunResult->getErrorRuns());
        return $this;
    }


    /**
     * @return ErrorRunResult[]
     */
    public function getErrorRuns(): array
    {
        return $this->errorRuns;
    }


    public function getRunsCount(): int
    {
        return $this->runsCount;
    }
}
