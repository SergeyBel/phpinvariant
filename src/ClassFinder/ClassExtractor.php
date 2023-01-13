<?php

namespace PhpInvariant\ClassFinder;

use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use ReflectionClass;

class ClassExtractor
{
    public function getClassFromFile(string $file): ReflectionClass
    {
        $code = file_get_contents($file);
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $ast = $parser->parse($code);
        $traverser = new NodeTraverser();
        $visitor = new Visitor();
        $traverser->addVisitor($visitor);

        $traverser->traverse($ast);
        return new ReflectionClass($visitor->getClassName());
    }
}
