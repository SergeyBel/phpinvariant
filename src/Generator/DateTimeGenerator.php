<?php

namespace PhpInvariant\Generator;

use PhpInvariant\Random\Random;
use DateTimeImmutable;

class DateTimeGenerator extends Random implements GeneratorInterface
{
    private DateTimeImmutable $from;
    private DateTimeImmutable $to;

    public function __construct()
    {
        $this->from = (new DateTimeImmutable())->setTimestamp(0);
        $this->to = (new DateTimeImmutable());
    }


    public function get(): DateTimeImmutable
    {

        return (new DateTimeImmutable())->setTimestamp($this->getInt($this->from->getTimestamp(), $this->to->getTimestamp()));
    }

    public function from(DateTimeImmutable $from)
    {
        $this->from = $from;
        return $this;
    }

    public function to(DateTimeImmutable $to)
    {
        $this->to = $to;
        return $this;
    }


}
