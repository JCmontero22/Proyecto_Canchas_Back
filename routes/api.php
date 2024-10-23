<?php

use App\Http\Controllers\AUTH\autController;
use App\Http\Controllers\USUARIOS\usuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



//Route::post('registroUsuario', [usuariosController::class, 'store']);

Route::apiResource('usuarios', usuariosController::class);

Route::post('login', [autController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [autController::class, 'logout']);
});
