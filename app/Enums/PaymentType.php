<?php

namespace App\Enums;

enum PaymentType: string
{
    case Efectivo = 'EFECTIVO';
    case Transferencia = 'TRANFERECNIA';
    case Cheque = 'CHEQUE';
    // case Abono = 'ABONO';

    public function label(): string
    {
        return match ($this) {
            self::Efectivo => 'Efectivo',
            self::Transferencia => 'Transferencia',
            self::Cheque => 'Cheque',
            // self::Abono => 'Abono',
        };
    }
}
