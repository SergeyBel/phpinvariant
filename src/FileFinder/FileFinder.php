<?php

namespace PhpInvariant\FileFinder;

use Symfony\Component\Finder\Finder;

class FileFinder
{
    /**
     * @return string[]
     */
    public function findTestFiles(string $directory): array
    {
        $finder = new Finder();
        $files = $finder->files()->in($directory)->name('*Test.php');
        $testFiles = [];
        foreach ($files as $file) {
            $testFiles[] = $file->getRealPath();
        }
        return $testFiles;
    }
}
