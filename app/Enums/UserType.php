<?php

namespace App\Enums;

enum UserType: int
{
    case ADMINISTRADOR = 0;
    case GERENTE_INVENTARIO = 1;
    case USUARIO_VENTAS = 2;

    public function label(): string
    {
        return match ($this) {
            self::ADMINISTRADOR => 'Administrador',
            self::GERENTE_INVENTARIO => 'Gerente de Inventario',
            self::USUARIO_VENTAS => 'Usuario de Ventas',
        };
    }
}
