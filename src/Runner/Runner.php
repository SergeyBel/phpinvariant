<?php

namespace PhpInvariant\Runner;

use PhpInvariant\ClassFinder\ClassFinder;
use PhpInvariant\FileFinder\FileFinder;
use PhpInvariant\Runner\Dto\RunnerConfiguration;
use PhpInvariant\TestRunner\TestRunner;

class Runner
{
    public function __construct(
        private FileFinder $fileFinder,
        private ClassFinder $classFinder,
        private TestRunner $testRunner,
    ) {
    }
    public function runTests(RunnerConfiguration $configuration): void
    {
        $testFiles = $this->fileFinder->findTestFiles($configuration->directory);
        $testsClasses = $this->classFinder->findTestClasses($testFiles);
        foreach ($testsClasses as $test) {
            $this->testRunner->runTest($test);
        }
    }
}
