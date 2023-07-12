<?php

namespace PhpInvariant\FileFinder;

use PhpInvariant\FileFinder\Exception\FilesFindException;
use Symfony\Component\Finder\Exception\DirectoryNotFoundException;
use Symfony\Component\Finder\Finder;

class FileFinder
{
    public const FILE_MASK = '*Invariant.php';

    /**
     * @return string[]
     */
    public function findInvariantFiles(string $path): array
    {
        try {
            $finder = new Finder();
            $files = $finder->files()->in($path)->name(self::FILE_MASK);
            $checkFiles = [];
            foreach ($files as $file) {
                $checkFiles[] = $file->getRealPath();
            }
            return $checkFiles;
        } catch (DirectoryNotFoundException) {
            throw FilesFindException::directoryNotFound($path);
        }
    }
}
