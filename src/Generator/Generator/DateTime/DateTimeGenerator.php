<?php

namespace PhpInvariant\Generator\Generator\DateTime;

use DateTime;
use PhpInvariant\Generator\Generator\GeneratorInterface;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use PhpInvariant\Generator\TypeInterface;
use PhpInvariant\Random\Random;

class DateTimeGenerator implements GeneratorInterface
{
    public function __construct(
        private Random $random
    ) {
    }

    /**
     * @param DateTimeType $type
     */
    public function generate(TypeInterface $type): DateTime
    {
        $from = !is_null($type->from) ? $type->from->getTimestamp() : 0;
        $before = !is_null($type->before) ? $type->before->getTimestamp() : 0xffffffff;
        $dateTime = (new DateTime())->setTimestamp($this->random->getInt($from, $before));
        return $dateTime;
    }
}
