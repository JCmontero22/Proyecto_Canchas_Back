<?php

namespace App\Http\Requests\USUARIOS;

use Illuminate\Foundation\Http\FormRequest;

class usuarioRegistroRequest extends FormRequest
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
            'nombreUsuario'     => ['string', 'required'],
            'emailUsuario'      => ['email', 'required', 'unique:users,email_usuario'],
            'passUsuario'       => ['string', 'required', 'min:8'],
            'telefonoUsuario'   => ['string', 'required', 'min:10', 'max:10']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'nombre_usuario'    => $this->nombreUsuario,
            'email_usuario'     => $this->emailUsuario,
            'password'          => $this->passUsuario,
            'telefono_usuario'  => $this->telefonoUsuario
        ]);
    }

    public function messages() {
        return [
            'nombreUsuario.string'         => 'El atributo nombre solo acepta letras',
            'nombreUsuario.required'       => 'El atributo nombre es requerido',

            'emailUsuario.string'          => 'El atributo email no es de tipo email',
            'enailUsuario.required'        => 'El atributo emailUsuario es obligatorio',
            'emailUsuario.unique'          => ['El email ya se encuentra registrado' => 'error'],

            'passUsuario.required'          => 'El atributo contraseña es requerido',

            'telefonoUsuario.required'      => 'El campo telefono es requerido',
            'telefonoUsuario.min'          => 'El telefono debe tener 10 caracteres',
            'telefonoUsuario.max'          => 'El telefono debe tener 10 caracteres'
        ];
    }
}
