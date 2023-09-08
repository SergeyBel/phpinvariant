<?php

namespace PhpInvariant\Registrator;

class ParametersRegistrator
{
    /**
     * @var array<mixed>
     */
    private static array $parameters = [];

    /**
     * @return mixed[]
     */
    public static function get(): array
    {
        return self::$parameters;
    }

    public static function add(mixed $parameter): void
    {
        self::$parameters[] = $parameter;
    }

    public static function clear(): void
    {
        self::$parameters = [];

    }


}
