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
        $invariantClasses = [];
        foreach ($files as $file) {
            $invariantClasses[] = $this->classExtractor->getClassFromFile($file);
        }
        return $invariantClasses;
    }
}
