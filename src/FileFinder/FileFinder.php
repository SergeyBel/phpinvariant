<?php

namespace PhpInvariant\FileFinder;

use Symfony\Component\Finder\Finder;

class FileFinder
{
    public const FILE_MASK = '*Test.php';
    /**
     * @return string[]
     */
    public function findTestFiles(string $path): array
    {
        if (!is_dir($path)) {
            return [$path];
        }

        $finder = new Finder();
        $files = $finder->files()->in($path)->name(self::FILE_MASK);
        $testFiles = [];
        foreach ($files as $file) {
            $testFiles[] = $file->getRealPath();
        }
        return $testFiles;
    }
}
