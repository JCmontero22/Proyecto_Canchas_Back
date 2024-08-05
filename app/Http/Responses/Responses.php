<?php

namespace App\Http\Responses;


class Responses
{
    static function sucess($statusCode, $titulo, $mensaje, $icono, $data = [], $token = null){
        $respuesta = [
            'statusCode'    => $statusCode,
            'titulo'        => $titulo,
            'mensaje'       => $mensaje,
            'icono'         => $icono,
            'data'          => $data,
            'token'         => $token
        ];

        return response()->json($respuesta, $statusCode);
    }

    static function error($statusCode, $titulo, $mensaje, $icono, $error = null){
        $respuesta = [
            'statusCode'    => $statusCode,
            'titulo'        => $titulo,
            'mensaje'       => $mensaje,
            'icono'         => $icono,
            'error'         => $error
        ];

        return response()->json($respuesta, $statusCode);
    }

    static function warning($statusCode, $titulo, $mensaje, $icono, $data = null) {
        $respuesta = [
            'statusCode'    => $statusCode,
            'titulo'        => $titulo,
            'mensaje'       => $mensaje,
            'icono'         => $icono,
            'data'          => $data
        ];

        return response()->json($respuesta);
    }
}
