<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDemandRequest extends FormRequest
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
            'type' => [
                'required',
                'string',
                'min:1',
                'max:225',
            ],
            'arrival_date' => [
                'required',
                'date',
            ],
            'cycle' => [
                'required',
                'string',
                'min:1'
            ],
            'mark_id' => [
                'required',
                'exists:marks,id',
            ],
        ];
    }
}
