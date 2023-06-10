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
        $result = new RunnerResult();
        $appliedConfiguration = $this->configurationApplyer->applyConfiguration($configuration);
        $result->setConfiguration($appliedConfiguration);
        $invariantFiles = $this->fileFinder->findInvariantFiles($configuration->path);
        $invariantClasses = $this->classFinder->findCheckClasses($invariantFiles);

        $appliedConfiguration->progress->start(count($invariantClasses));
        foreach ($invariantClasses as $invariantClass) {
            $checkResult = $this->checkRunner->runCheck($invariantClass);
            $result->addCheckResult($checkResult);
            $appliedConfiguration->progress->step();
        }

        $appliedConfiguration->progress->finish();

        return $result;
    }
}
