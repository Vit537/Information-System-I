<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActualizarCredencialesRequest extends FormRequest
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
            'correo' => [
                'required',
                'email',
                Rule::unique('persona', 'correo')->ignore($this->route('id')), // Ignora el ID actual
            ],
            'contrasenaActual' => 'required|min:4',
            'contrasenaNueva' => 'required|min:4',
            'confirmacion_contrasena' => 'required|same:contrasenaNueva',
        ];
        // 'correo' => 'required|unique:persona,correo|email',
    }
}
