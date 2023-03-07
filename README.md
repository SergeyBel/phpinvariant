# PhpInvariant
PhpInvariant is a property-based testing framework for php  
It runs your code on customized random data and checks predefined invariants. Looks like [QuickCheck](https://hackage.haskell.org/package/QuickCheck) 


# Installation
The recommended way to install PhpInvariant is through Composer

`composer require --dev sergey-bel/phpinvariant`

# Quick start
1. Create a folder `invariants`
2. Create Test class inside this folder
3. Run command `vendor/bin/phpinvariant run invariants`

# How to write invariant check
Rules:  
1. Сlass name must end with 'Check'
1. Class must extends `BaseInvariantCheck`
1. Each public method with a name 'check...' will be launched

## Generators
Generators generate random data for invariants checking. To use a generator for a variable write the attribute for variable  

## Finish conditions
These conditions are used to determine when to end the test execution. To determine finish condition  write the attribute for test method

## Example

```php
class SimpleCheck extends BaseInvariantCheck
{
    #[FinishCount(10)]
    public function checkSimple(#[IntegerGenerator(50, 101)] int $x)
    {
        // fail when $x=101
        $this->assertTrue($x < 100);
    }
}
```
Explanation:  
* `#[FinishCount(10)]` - run test 10 times
* `#[IntegerGenerator(50, 101)] int $x` - randomly generate integer `$x` in [50, 101]





