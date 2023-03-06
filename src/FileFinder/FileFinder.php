<?php

namespace PhpInvariant\FileFinder;

use Symfony\Component\Finder\Finder;

class FileFinder
{
    public const FILE_MASK = '*Check.php';
    /**
     * @return string[]
     */
    public function findCheckFiles(string $path): array
    {
        if (!is_dir($path)) {
            return [realpath($path)];
        }

        $finder = new Finder();
        $files = $finder->files()->in($path)->name(self::FILE_MASK);
        $checkFiles = [];
        foreach ($files as $file) {
            $checkFiles[] = $file->getRealPath();
        }
        return $checkFiles;
    }
}
