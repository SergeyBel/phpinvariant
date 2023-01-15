<?php

namespace PhpInvariant\TestMethodRunner\Dto;

class MethodRunResult
{
    private int $runsCount = 0;
    /** @var ErrorRunResult[] */
    private array $errorRuns = [];


    public function incrementRunCount()
    {
        $this->runsCount++;
    }

    public function addErrorRun(string $testName, string $methodName, string $message, array $trace)
    {
        $this->errorRuns[] = new ErrorRunResult(
            $testName,
            $methodName,
            $message,
            $trace
        );
    }

    /**
     * @return int
     */
    public function getRunsCount(): int
    {
        return $this->runsCount;
    }

    /**
     * @return array
     */
    public function getErrorRuns(): array
    {
        return $this->errorRuns;
    }





}
