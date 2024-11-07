<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductTable extends Component
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
            $this->rows[$index]['selling_price'] = $product['selling_price'];
        }

        // Recalcular el total
        $this->rows[$index]['total'] = $this->rows[$index]['selling_price'] * $this->rows[$index]['quantity'];

        //sumar todos los totales
        $this->Subtotal = collect($this->rows)->sum('total');
        if ($this->iva == 0) {
            $this->total = $this->Subtotal;
            $this->dispatch('total-actualizado', total: $this->total);
            $this->dispatch('productos-actualizado', products: $this->rows);
        }
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows); // Reindexa el arreglo

        $this->Subtotal = collect($this->rows)->sum('total');
    }

    public function updateTotalIVA()
    {
        $this->total = $this->Subtotal + ($this->Subtotal * $this->iva / 100);
        $this->dispatch('total-actualizado', total: $this->total);
        $this->dispatch('productos-actualizado', products: $this->rows);
    }

    public function render()
    {
        return view('livewire.product-table');
    }
}
