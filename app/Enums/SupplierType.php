<?php

namespace App\Enums;

enum SupplierType: string
{
    case Mayorista = 'wholesaler';
    case Distribuidor = 'distributor';
    case Productor = 'producer';

    public function label(): string
    {
        return match ($this) {
            self::Mayorista => 'Mayorista',
            self::Distribuidor => 'Distribuidor',
            self::Productor => 'Productor',
        };
    }
}
