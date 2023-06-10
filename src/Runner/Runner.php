<?php

namespace PhpInvariant\Runner;

use PhpInvariant\ClassFinder\ClassFinder;
use PhpInvariant\FileFinder\FileFinder;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
use PhpInvariant\Runner\Dto\RunnerResult;
use PhpInvariant\CheckRunner\CheckRunner;

class Runner
{
    public function __construct(
        private ConfigurationApplyer $configurationApplyer,
        private FileFinder $fileFinder,
        private ClassFinder $classFinder,
        private CheckRunner $checkRunner,
    ) {
    }

    public function runChecks(RunnerConfiguration $configuration): RunnerResult
    {
        $appliedConfiguration = $this->configurationApplyer->applyConfiguration($configuration);
        $invariantFiles = $this->fileFinder->findInvariantFiles($configuration->path);
        $invariantClasses = $this->classFinder->findInvariantClasses($invariantFiles);

        $appliedConfiguration->progress->start(count($invariantClasses));
        $result = new RunnerResult($appliedConfiguration);

        foreach ($invariantClasses as $invariantClass) {
            $checkResult = $this->checkRunner->runCheck($invariantClass);
            $result->addCheckResult($checkResult);
            $appliedConfiguration->progress->step();
        }

        $appliedConfiguration->progress->finish();

        return $result;
    }
}
