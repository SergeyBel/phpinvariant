<?php

namespace PhpInvariant\CheckRunner\Dto;

use PhpInvariant\CheckMethodRunner\Dto\ErrorRunResult;
use PhpInvariant\CheckMethodRunner\Dto\MethodRunResult;

class CheckRunResult
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
