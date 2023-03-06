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
        $checkFiles = $this->fileFinder->findCheckFiles($configuration->path);
        $checkClasses = $this->classFinder->findCheckClasses($checkFiles);

        foreach ($checkClasses as $check) {
            $checkResult = $this->checkRunner->runCheck($check);
            $result->addCheckResult($checkResult);
        }

        return $result;
    }
}
