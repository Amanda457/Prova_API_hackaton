<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|min:2',
            'cognom' => 'required|string|min:2',
            'telefon' => 'required|digits:9',
            'edat' => 'required|int|min:0',
            'email' => [
                'nullable', 
                'email', 
                'max:70', 
                Rule::unique('users')->ignore($this->route('id')),
                 ]
    ];}
}
