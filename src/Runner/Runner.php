<?php

namespace PhpInvariant\Runner;

use PhpInvariant\ClassFinder\ClassFinder;
use PhpInvariant\FileFinder\FileFinder;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
use PhpInvariant\Runner\Dto\RunnerResult;
use PhpInvariant\TestRunner\TestRunner;

class Runner
{
    public function __construct(
        private ConfigurationApplyer $configurationApplyer,
        private FileFinder $fileFinder,
        private ClassFinder $classFinder,
        private TestRunner $testRunner,
    ) {
    }
    public function runTests(RunnerConfiguration $configuration): RunnerResult
    {
        $result = new RunnerResult();
        $this->configurationApplyer->applyConfiguration($configuration);
        $testFiles = $this->fileFinder->findTestFiles($configuration->directory);
        $testsClasses = $this->classFinder->findTestClasses($testFiles);

        foreach ($testsClasses as $test) {
            $testResult = $this->testRunner->runTest($test);
            $result->addTestResult($testResult);
        }

        return $result;
    }
}
