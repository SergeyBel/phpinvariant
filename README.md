# PhpInvariant
![build](https://github.com/SergeyBel/phpinvariant/actions/workflows/php-ci.yml/badge.svg?branch=main)

PhpInvariant is a property-based testing framework for php  
It runs your code on customized random data and checks predefined invariants (similar to [QuickCheck](https://hackage.haskell.org/package/QuickCheck)) 


# Installation
The recommended way to install PhpInvariant is through Composer

`composer require --dev sergey-bel/phpinvariant`

# Quick start
1. Create a folder `invariants`
2. Create `...Check` class inside this folder
    1. Class must extends `BaseInvariantCheck`
    1. Each public method with a name 'check...' will be launched
3. Run command `vendor/bin/phpinvariant check --path=invariants`

See [examples](https://github.com/SergeyBel/phpinvariant/tree/main/invariants/examples)


## Generators
Generators generate random data for invariants checking  
Generator for the parameter is specified by parameter attribute


## Finish conditions
These conditions are used to determine when to end the check execution  
Finish condition is specified by method attribute

## Example
```php
class IntegerCheck extends BaseInvariantCheck
{
    // run check method 10 times
    #[FinishCount(10)]
    public function checkSimple(#[IntegerGenerator(90, 101)] int $x)
    {
        // $x is a random integer in [90, 101]
        // fail when $x=101
        $this->assertTrue($x <= 100);
    }
}
```
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

`vendor/bin/phpinvariant check --config=config.yml`

### How to write custom generator
PhpInvariant allows writing custom generators to generate data for you needs

To write a generator you need to create two classes and add they in config file:
1. `Type` class. This class uses as attribute and store settings for generator It must implements `TypeInterface`.  
1. `Generator` class. It generates data based on settings from `Type` class. Must implements `GeneratorInterface`
1. Add classes in `generators` configuration file section
```yml
parameters:
   path: invariants

generators:
   Custom\CustomType: Custom\CustomGenerator
```

## Development
`git clone https://github.com/SergeyBel/AES.git`  
`docker-compose up -d`  

Use Makefile commands:  
`fix` - run code style fixer  
`static` - run static analyzer  
`test` - run tests  

