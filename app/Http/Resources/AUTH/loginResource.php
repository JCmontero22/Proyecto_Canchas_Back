<?php

namespace App\Http\Resources\AUTH;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class loginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idUsuario' => $this->id,
            'nombre' => $this->nombre_usuario,
            'email' => $this->email_usuario,
            'telefono' => $this->telefono_usuario,
        ];
    }

    public function withResponse($request, $response) {
        $response->setData($this->toArray($request));
    }
}
