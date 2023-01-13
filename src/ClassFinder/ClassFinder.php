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
    public function findTestClasses(array $files): array
    {
        $testsClasses = [];
        foreach ($files as $file) {
            $testsClasses[] = $this->classExtractor->getClassFromFile($file);
        }
        return $testsClasses;
    }
}
