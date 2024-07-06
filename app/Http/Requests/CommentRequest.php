<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => ['required', 'string', 'min:1']
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'El campo de contenido del comentario es obligatorio',
            'content.string' => 'Debe ingresar valores válidos',
            'content.min' => 'El campo de contenido del comentario deben tener al menos 1 caracter'
        ];
    }
}
