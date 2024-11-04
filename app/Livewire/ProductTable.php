<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("NO.", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Code", "code")
                ->sortable(),
            Column::make("Cantidad", "quantity")
                ->sortable(),
            Column::make("Alerta de Cantidad", "quantity_alert")
                ->sortable(),
            Column::make("Precio de compra", "buying_price")
                ->sortable(),
            Column::make("Precio de venta", "selling_price")
                ->sortable(),
            Column::make("Impuesto", "iva")
                ->sortable(),
            Column::make("Tipo de impuesto", "iva_type")
                ->sortable(),
            Column::make("Category id", "category_id")
                ->sortable(),
            Column::make("Unit id", "unit_id")
                ->sortable(),
        ];
    }
}
