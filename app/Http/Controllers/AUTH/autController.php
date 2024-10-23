<?php

namespace App\Http\Controllers\AUTH;

use App\Http\Controllers\Controller;
use App\Http\Requests\AUTH\loginRequest;
use App\Http\Resources\AUTH\loginResource;
use App\Http\Responses\Responses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class autController extends Controller
{
    public function login(loginRequest $request) {

        if (!Auth::attempt(['email_usuario' => $request->emailUsuario, 'password' => $request->passUsuario])) {
            return Responses::error(400, 'Error de autenticacion', 'Error de credenciales favor intente de nuevo', 'error');
        }

        $usuario = User::where('email_usuario', $request->emailUsuario)->firstOrFail();
        $token = $usuario->createToken('api_token')->plainTextToken;

        return Responses::successSesion(200, 'Bienvenido', 'ha iniciado sesion satisfactoriamente', 'success', new loginResource($usuario), $token);
    }

    //prueba
    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return Responses::sucess(200, 'Cierre de sesion', 'ha finalizado la sesion exitosamente', 'success');
    }

}
