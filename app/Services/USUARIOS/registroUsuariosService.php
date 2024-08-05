<?php

namespace App\Services\USUARIOS;

use App\Http\Requests\USUARIOS\usuarioRegistroRequest;
use App\Http\Resources\USUARIOS\storeRegistroUsuarios;
use App\Http\Responses\Responses;
use App\Models\User;

class registroUsuariosService
{
    public function registroUsuario(usuarioRegistroRequest $request) {
        try {
            $usuario = User::create($request->all());

            if (!$usuario) {
                throw new \InvalidArgumentException('No se pudo realizar el registro');
            }

            $token = $usuario->createToken('registro_apiToken')->plainTextToken;

            return Responses::sucess(200, 'Registro realizado', 'Se realizo el registro del usuario con exito', 'success', new storeRegistroUsuarios($usuario), $token);

        } catch (\Exception $e) {
            return Responses::error(401, 'Error al reaglizar el registro', 'Se precento un error al realizar el registro favor intente mas tarde', 'error', $e->getMessage());
        }

    }
}

