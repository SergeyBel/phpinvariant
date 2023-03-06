<?php

namespace PhpInvariant\CheckMethodRunner\Dto;

class CheckMethodCallResult
{
    /**
     * @var array<mixed>
     */
    public readonly array $parameters;
    /** @var ErrorRunResult[] */
    private array $errorRuns = [];


    /**
     * @param array<mixed> $parameters
     */
    public function __construct(
        array $parameters
    ) {
        $this->parameters = $parameters;
    }

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
    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
