# PhpInvariant
PhpInvariant is a property-based testing framework for php  
It runs your code on customized random data and checks predefined invariants. Looks like Quickcheck


# Installation
The recommended way to install PhpInvariant is through Composer

`composer require --dev sergey-bel/phpinvariant`

# Quick start example
1. Create a folder `invariants`
2. Create class SimpleTest inside this folder
```php
class SimpleTest extends BaseInvariantTest
{
    #[FinishCount(10)]
    public function testDivision(#[IntegerGenerator(99, 101)] int $x)
    {
        // fail when $x=101
        $this->assertTrue($x < 100);
    }
}
```
3. Run command `vendor/bin/phpinvariant run --dir=invariants`

# Documentation

