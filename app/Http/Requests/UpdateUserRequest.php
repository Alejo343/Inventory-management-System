<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->user),
                'email',
                'max:50',
            ],
            'username' => 'required|min:4|max:25|alpha_dash:ascii|unique:users,username',
            'username' => [
                'required',
                'min:4',
                'max:25',
                'alpha_dash:ascii',
                Rule::unique('users')->ignore($this->user),
            ]
        ];
    }
}