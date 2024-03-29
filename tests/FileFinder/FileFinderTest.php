<?php

namespace FileFinder;

use PhpInvariant\DependencyInjection\DependencyInjection;
use PhpInvariant\FileFinder\FileFinder;
use PHPUnit\Framework\TestCase;

class FileFinderTest extends TestCase
{
    public function testFindCheckFiles()
    {
        $directory = __DIR__.'/files/';
        $builder = new DependencyInjection();
        $container = $builder->compileContainer();
        /** @var FileFinder $fileFinder */
        $fileFinder = $container->get(FileFinder::class);
        $invariantFiles = $fileFinder->findInvariantFiles($directory);

        $this->assertSame(2, count($invariantFiles));
        $this->assertContains($directory.'OneInvariant.php', $invariantFiles);
        $this->assertContains($directory.'TwoInvariant.php', $invariantFiles);
    }
}
