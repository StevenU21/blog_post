<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:30', 'unique:tags,name,except,id']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo de nombre para las etiquetas es obligatorio',
            'name.string' => 'Debe ingrese un formato válido para el campo de nombre',
            'name.min' => 'El campo de nombre debe tener al menos 3 caracteres',
            'name.max' => 'El campo de nombre no debe tener mas de 30 caracteres',
            'name.unique' => 'El nombre de la etiqueta ya existe'
        ];
    }
}
