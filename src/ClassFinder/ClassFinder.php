<?php

namespace PhpInvariant\ClassFinder;

use ReflectionClass;

class ClassFinder
{
    public function __construct(
        private ClassExtractor $classExtractor
    ) {
    }
    /**
     * @param string[] $files
     * @return ReflectionClass[]
     */
    public function findCheckClasses(array $files): array
    {
        $checkClasses = [];
        foreach ($files as $file) {
            $checkClasses[] = $this->classExtractor->getClassFromFile($file);
        }
        return $checkClasses;
    }
}
