<?php

namespace App\Http\Controllers\USUARIOS;

use App\Http\Controllers\Controller;
use App\Http\Requests\USUARIOS\usuarioRegistroRequest;
use App\Services\USUARIOS\registroUsuariosService;
use Illuminate\Http\Request;

class usuariosController extends Controller{

    protected $registroUsuario;
    public function __construct(registroUsuariosService $registroUsuario) {
        $this->registroUsuario = $registroUsuario;
    }

    public function index(){
        //
    }

    public function create(){
        //
    }

    public function store(usuarioRegistroRequest $request){
        return $this->registroUsuario->registroUsuario($request);
    }

    public function show(string $id){
        //
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        //
    }

    public function destroy(string $id){
        //
    }



}
