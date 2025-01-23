<?php

namespace App\Traits;

trait EnumToArray
{
    public static function randomValue()
    {
        $length = sizeof(self::cases());
        $randomIndex = rand(0, $length - 1);
        return self::values()[$randomIndex];
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }
}
