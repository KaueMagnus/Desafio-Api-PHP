<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/filmes', [FilmeController::class, 'exibir']);
Route::get('/filmes/{id}', [FilmeController::class, 'exibirPeloid']);
Route::post('/filmes', [FilmeController::class, 'criar']);
Route::put('/filmes/{id}', [FilmeController::class, 'editar']);
Route::delete('/filmes/{id}', [FilmeController::class, 'deletar']);
