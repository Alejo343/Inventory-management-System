<?php

namespace App\Http\Requests;

use App\Enums\OrderStatus;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'customer_id' => 'required',
            'order_date' => 'required|string',
            'total_products' => 'required|numeric',
            'sub_total' => 'required|numeric',
            'iva' => 'numeric',
            'total' => 'required|numeric',
        ];
    }


    public function prepareForValidation(): void
    {
        $this->merge([
            'invoice_no' => IdGenerator::generate([
                'table' => 'orders',
                'field' => 'invoice_no',
                'length' => 10,
                'prefix' => 'INV-'
            ]),
            'order_status'     => OrderStatus::PENDING->value,
        ]);
    }
}
