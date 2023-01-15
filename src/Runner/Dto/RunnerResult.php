<?php

namespace PhpInvariant\Runner\Dto;

use PhpInvariant\TestRunner\Dto\TestRunResult;

class RunnerResult
{
    public int $time;
    public int $memory;
    public int $runCount;
    public int $testCount;
    public array $errorRuns = [];

    public function addTestResult(TestRunResult $testRunResult)
    {
        $this->runCount = $testRunResult->getRunsCount();
        $this->testCount++;
        $this->errorRuns = $testRunResult->getErrorRuns();
    }

}
