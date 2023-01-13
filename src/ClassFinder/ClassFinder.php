<?php

namespace PhpInvariant\ClassFinder;


class ClassFinder
{
    /**
     * @param string[] $files
     * @return \ReflectionClass[]
     */
    public function findTestClasses(array $files): array
    {
        foreach ($files as $file) {
            include_once $file;
        }

        $declaredClasses = get_declared_classes();
        $testsClasses = [];
        foreach ($declaredClasses as $declaredClass) {
            $testsClasses[] = new \ReflectionClass($declaredClass);
        }

        return $testsClasses;
    }
}
