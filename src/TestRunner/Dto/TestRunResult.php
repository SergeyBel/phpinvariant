<?php

namespace PhpInvariant\TestRunner\Dto;

use PhpInvariant\TestMethodRunner\Dto\MethodRunResult;

class TestRunResult
{
    private int $runsCount = 0;
    private array $errorRuns;

    /**
     * @param string $testName
     */
    public function __construct(string $testName)
    {
        $this->testName = $testName;
    }


    public function addMethodRunResult(MethodRunResult $methodRunResult)
    {
        $this->runCount += $methodRunResult->getRunsCount();
        $this->errorRuns = array_merge($this->errorRuns, $methodRunResult->getErrorRuns());
    }

    /**
     * @return array
     */
    public function getErrorRuns(): array
    {
        return $this->errorRuns;
    }

    /**
     * @return int
     */
    public function getRunsCount(): int
    {
        return $this->runsCount;
    }












}
