<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class OrderTable extends Component
{
    public $productsbd = []; // Lista de productos
    public $products = []; // Lista de productos
    public $allRows = [];
    public $rows = [];
    public $Subtotal = 0;
    public $iva = 0;
    public $total = 0;
    public $totalHidden = 0;



    public function mount()
    {
        // Ejemplo de productos. Puedes cargar estos datos de la base de datos.
        $this->products = Product::select('id', 'name', 'selling_price')->get()->toArray();;


        // Asegúrate de que rows esté inicializado como un array vacío.
        $this->rows = [];
        $this->addRow(); // Agrega una fila inicial
    }

    public function addRow()
    {
        $this->rows[] = [
            'product_id' => null,
            'quantity' => 1,
            'selling_price' => 0,
            'total' => 0,
        ];
    }

    public function update($index)
    {
        if (empty($this->rows)) {
            return;
        }

        $productId = $this->rows[$index]['product_id'];
        $product = collect($this->products)->firstWhere('id', $productId);

        if ($product) {
            // Asigna el precio de venta
            $this->rows[$index]['selling_price'] = $product['selling_price'];

            // // Verifica la cantidad máxima
            // if ($this->rows[$index]['quantity'] > $product['quantity']) {
            //     $this->rows[$index]['quantity'] = $product['quantity'];
            // }
        }

        $this->updateTotal();
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows); // Reindexa el arreglo

        $this->Subtotal = collect($this->rows)->sum('total');
    }
    public function updateTotal()
    {
        // Recalcular el subtotal
        $this->Subtotal = collect($this->rows)->sum(function ($row) {
            return $row['selling_price'] * $row['quantity'];
        });

        // Calcular el total con o sin IVA
        if ($this->iva == 0) {
            $this->total = $this->Subtotal;
        } else {
            $this->total = $this->Subtotal + ($this->Subtotal * $this->iva / 100);
        }

        // Enviar los eventos de actualización
        $this->dispatch('productos-actualizado', [
            'products' => $this->rows,
            'subtotal' => $this->Subtotal,
            'iva' => $this->iva,
            'total' => $this->total
        ]);
    }

    public function updateTotalIVA()
    {
        $this->updateTotal();
    }

    public function render()
    {
        return view('livewire.product-table');
    }
}
