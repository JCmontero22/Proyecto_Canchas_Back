<?php

namespace App\Http\Requests\AUTH;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'emailUsuario'      => ['email', 'required'],
            'passUsuario'       => ['string', 'required', 'min:8'],
        ];
    }

    public function messages() {
        return [

            'emailUsuario.string'          => 'El atributo email no es de tipo email',
            'emailUsuario.required'        => 'El atributo email es obligatorio',

            'passUsuario.required'          => 'El atributo contraseña es requerido',
        ];
    }
}
