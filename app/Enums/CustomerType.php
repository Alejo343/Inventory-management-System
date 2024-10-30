<?php

namespace App\Enums;

enum CustomerType: int
{
    case Individual = 0;
    case Mayorista = 1;
    case Corporativo = 2;

    public function label(): string
    {
        return match ($this) {
            self::Individual => __('Cliente Individual'),
            self::Mayorista => __('Cliente Mayorista'),
            self::Corporativo => __('Corporativo'),
        };
    }
}
