<?php

namespace App\Http\Requests;

use App\Enums\PurchaseStatus;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
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
            'supplier_id'   => 'required',
            'date'          => 'required|string',
            'total_amount'  => 'required|numeric',
            'status'        => 'required',
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'purchase_no' => IdGenerator::generate([
                'table' => 'purchases',
                'field' => 'purchase_no',
                'length' => 10,
                'prefix' => 'PRS-'
            ]),
            'status'     => PurchaseStatus::PENDING->value,
            // 'created_by' => auth()->user()->id,
            'created_by' => '1',
        ]);
    }

    public function messages(): array
    {
        return [
            'supplier_id.required' => 'El proovedor es obligatorio',
        ];
    }
}
