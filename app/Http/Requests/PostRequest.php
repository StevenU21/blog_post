<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:80'],
            'content' => ['required', 'string'],
            'category_id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El campo de nombre para el post es obligatorio',
            'title.string' => 'Debe ingresar valores válidos para el campo de título',
            'title.min' => 'El campo de título debe teber al menos 3 caracteres',
            'title.max' => 'El campo de título no puede tener mas de 50 caracteres',
            'content.required' => 'El campo de contenido es obligatorio',
            'content.string' => 'Debe ingresar valores válidos para el campo de contenido',
            'category_id.required' => 'La categoria es obligatoria'
        ];
    }
}
