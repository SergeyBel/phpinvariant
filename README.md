# PhpInvariant
![build](https://github.com/SergeyBel/phpinvariant/actions/workflows/php-ci.yml/badge.svg?branch=main)

PhpInvariant is a property-based testing framework for php  
It runs your code on customized random data and checks predefined invariants (similar to [QuickCheck](https://hackage.haskell.org/package/QuickCheck)) 


# Installation
The recommended way to install PhpInvariant is through Composer
```
composer require --dev sergey-bel/phpinvariant
```

# Quick start
1. Create a folder `invariants`
2. Create `...Invariant` class inside this folder
    1. Class must extends `BaseInvariant`
    1. Each public method with a name 'check...' will be launched
3. Run command `vendor/bin/phpinvariant run --path=invariants`

See [examples](https://github.com/SergeyBel/phpinvariant/tree/main/invariants/examples)


## Example

```php
class IntegerInvariant extends BaseInvariant
{
    // run check method 10 times
    #[FinishRuns(10)]
    public function checkInteger()
    {
        // $x is a random integer in [50, 100]
        $x = $this->provider->integer(50, 100)->get();

        $this->assertTrue(is_integer($x));
        // fail when $x=100
        $this->assertLessOrEqual($x, 99);
        $this->assertGreaterOrEqual($x, 50);
    }
}
```

## Provider
Provider is a main class to generate random data

This example will generate a alphabetic string with length between 5 and 10 (inclusive)
```php
$this->provider
       ->string(5, 10)
       ->alphabetic()
       ->get();
```

## Finish conditions
Finish conditions are used to determine when to end the check execution  
Finish condition is specified by method attribute


## Command Line Options
`--path`    
Specifies directory with Check classes    
`--config`    
Specifies the path to a configuration file  
`--no-progress`  
Do not show progress bar  
`--quiet`  
Do not output any message  
`--seed`    
Specifies random seed   

## Configuration file
PhpInvariant uses YAML configuration format. All command line options are supported in configuration file `parameters` section  

Example:
```yml
parameters:
   path: invariants
   no-progress: false
```
A config file can be passed in `--config` option:

`vendor/bin/phpinvariant run --config=phpinvariant.yml`

## Development
`git clone https://github.com/SergeyBel/phpinvariant.git`  
`docker-compose up -d`  

Use Makefile commands:  
`fix` - run code style fixer  
`static` - run static analyzer  
`test` - run tests  

