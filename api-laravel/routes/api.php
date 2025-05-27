<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/boas-vindas', [ApiController::class, 'boasVindas']);

Route::get('/usuarios', [ApiController::class, 'listarUsuarios']);

Route::post('/usuarios', [ApiController::class, 'criarUsuario']);
?>