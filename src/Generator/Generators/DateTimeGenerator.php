<?php

namespace PhpInvariant\Generator\Generators;

use DateTimeImmutable;

class DateTimeGenerator extends BaseGenerator
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
        $value = (new DateTimeImmutable())->setTimestamp(
            $this->getInt(
                $this->from->getTimestamp(),
                $this->to->getTimestamp()
            )
        );


        $this->register($value);
        return $value;
    }

    public function from(DateTimeImmutable $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function to(DateTimeImmutable $to): self
    {
        $this->to = $to;
        return $this;
    }


}
