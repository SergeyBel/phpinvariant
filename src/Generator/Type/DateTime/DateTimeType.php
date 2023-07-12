<?php

namespace PhpInvariant\Generator\Type\DateTime;

use DateTime;
use Attribute;

#[Attribute]

class DateTimeType
{
    public function __construct(
        public ?DateTime $from = null,
        public ?DateTime $before = null,
    ) {
    }
}
