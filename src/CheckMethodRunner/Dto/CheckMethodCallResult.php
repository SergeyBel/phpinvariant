<?php

namespace PhpInvariant\CheckMethodRunner\Dto;

class CheckMethodCallResult
{
    /** @var ErrorRunResult[] */
    private array $errorRuns = [];


    public function addErrorRun(ErrorRunResult $errorRunResult): static
    {
        $this->errorRuns[] = $errorRunResult;
        return $this;
    }
    /**
     * @return ErrorRunResult[]
     */
    public function getErrorRuns(): array
    {
        return $this->errorRuns;
    }

}
