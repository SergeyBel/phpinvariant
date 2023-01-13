<?php

namespace PhpInvariant\ClassFinder;

use PhpParser\NodeVisitorAbstract;
use PhpParser\Node;

class Visitor extends NodeVisitorAbstract
{
    private string $namespace;
    private string $className;

    public function enterNode(Node $node)
    {
        if ($node instanceof Node\Stmt\Namespace_) {
            $this->namespace = implode('\\', $node->name->parts);
        }

        if ($node instanceof Node\Stmt\Class_) {
            $this->className = $node->name;
        }

        return null;
    }

    public function getClassName(): string
    {
        return $this->namespace.'\\'.$this->className;
    }
}
