<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:30', 'unique:categories,name,except,id']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo de nombre para la categoria es obligatorio',
            'name.string' => 'Debe ingresar valores válidos',
            'name.min' => 'El campo de nombre debe tener al menos 3 caracteres',
            'name.max' => 'El campo de nombre no puede tener mas de 30 caracteres',
            'name.unique' => 'El campo de nombre ya existe'
        ];
    }
}
