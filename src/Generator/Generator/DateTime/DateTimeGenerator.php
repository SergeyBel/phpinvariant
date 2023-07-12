<?php

namespace PhpInvariant\Generator\Generator\DateTime;

use DateTime;
use PhpInvariant\Generator\Type\DateTime\DateTimeType;
use PhpInvariant\Random\Random;

class DateTimeGenerator
{
    public function __construct(
        private Random $random
    ) {
    }


    public function __invoke(DateTimeType $type): DateTime
    {
        $from = !is_null($type->from) ? $type->from->getTimestamp() : 0;
        $before = !is_null($type->before) ? $type->before->getTimestamp() : 0xffffffff;
        $dateTime = (new DateTime())->setTimestamp($this->random->getInt($from, $before));
        return $dateTime;
    }
}
