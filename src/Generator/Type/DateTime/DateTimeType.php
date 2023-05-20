<?php

namespace PhpInvariant\Generator\Type\DateTime;

use DateTime;
use PhpInvariant\Generator\TypeInterface;
use Attribute;

#[Attribute]

class DateTimeType implements TypeInterface
{
    public function __construct(
        public ?DateTime $from = null,
        public ?DateTime $before = null,
    ) {
    }
}
