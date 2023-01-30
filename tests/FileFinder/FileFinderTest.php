<?php

namespace FileFinder;

use PhpInvariant\DependencyInjection\DependencyInjection;
use PhpInvariant\FileFinder\FileFinder;
use PHPUnit\Framework\TestCase;

class FileFinderTest extends TestCase
{
    public function testFindTestFiles()
    {
        $directory = __DIR__.'/files/';
        $builder = new DependencyInjection();
        $container = $builder->compileContainer();
        /** @var FileFinder $fileFinder */
        $fileFinder = $container->get(FileFinder::class);
        $invariantFiles = $fileFinder->findTestFiles($directory);
        $expected = [$directory.'OneTest.php', $directory.'TwoTest.php'];
        $this->assertEquals($expected, $invariantFiles);
    }
}
