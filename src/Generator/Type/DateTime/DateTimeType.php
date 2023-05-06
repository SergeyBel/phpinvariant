<?php

namespace PhpInvariant\Generator\Type\DateTime;

use DateTimeImmutable;
use PhpInvariant\Generator\TypeInterface;
use Attribute;

#[Attribute]

class DateTimeType implements TypeInterface
{
    public function __construct(
        public ?DateTimeImmutable $from = null,
        public ?DateTimeImmutable $before = null,
    ) {
    }
}
