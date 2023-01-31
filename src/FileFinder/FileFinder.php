<?php

namespace PhpInvariant\FileFinder;

use Symfony\Component\Finder\Finder;

class FileFinder
{
    public const FILE_MASK = '*Test.php';
    /**
     * @return string[]
     */
    public function findTestFiles(string $directory): array
    {
        $finder = new Finder();
        $files = $finder->files()->in($directory)->name(self::FILE_MASK);
        $testFiles = [];
        foreach ($files as $file) {
            $testFiles[] = $file->getRealPath();
        }
        return $testFiles;
    }
}
