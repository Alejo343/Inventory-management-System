<?php

namespace App\Http\Requests;

use App\Enums\TaxType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // Nombre del producto
            'category_id' => 'required|exists:categories,id', // ID de la categoría, debe existir en la tabla categories
            'unit_id' => 'required|string|max:255', // Unidad (puedes ajustar si es un ID o un string)
            'selling_price' => 'required|numeric|min:0', // Precio de venta
            'buying_price' => 'required|numeric|min:0', // Precio de compra
            'quantity' => 'required|integer|min:0', // Cantidad, debe ser un número entero no negativo
            'quantity_alert' => 'integer|min:0', // Alerta de cantidad, opcional pero no negativo
            'iva' => 'nullable|numeric|min:0|max:100', // IVA, opcional entre 0 y 100
            'iva_type' => 'required|in:' . implode(',', array_keys(TaxType::cases())), //'required|in:0,1'
            'notes' => 'nullable|string|max:500', // Notas, opcional con un máximo de 500 caracteres
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name, '-'),
            'code' => IdGenerator::generate([
                'table' => 'products',
                'field' => 'code',
                'length' => 4,
                'prefix' => 'PC'
            ])
        ]);
    }
}
