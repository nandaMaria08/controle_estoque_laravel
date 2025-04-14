<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClientRequest extends FormRequest
{
    
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
            'name' => [
                'required',
                'min:1',
                'max:255',
            ],
            'email' => [
                'nullable',
                'unique:clients,email',
                ],
            'phone'=> [
                'required',
                'max:20',
                ],
            'cpf'=> [
                'required',
                'max:14',
                'unique:clients,cpf'
                ],
            'address' => [
                'nullable',
            ]
        ];
    }
}
