<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rotas agrupadas para Usuario
Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'get');           // Listar todos
    Route::get('/usuarios/{id}', 'details');  // Buscar por ID
    Route::post('/usuarios', 'store');        // Criar
    Route::put('/usuarios/{id}', 'update');   // Atualizar
    Route::delete('/usuarios/{id}', 'delete'); // Deletar
    
    Route::get('/usuarios/{id}/reviews', 'reviews'); // Listar reviews de um usuário
});

// Rotas agrupadas para Autor
Route::controller(AutorController::class)->group(function () {
    Route::get('/autores', 'get');           // Listar todos
    Route::get('/autores/{id}', 'details');  // Buscar por ID
    Route::post('/autores', 'store');        // Criar
    Route::put('/autores/{id}', 'update');   // Atualizar
    Route::delete('/autores/{id}', 'delete'); // Deletar

    Route::get('/autores/{id}/livros', 'livros'); // Listar livros de um autor
    Route::get('/autores-com-livros', 'getWithLivros'); // Listar autores com seus livros
});

// Rotas agrupadas para Genero
Route::controller(GeneroController::class)->group(function () {
    Route::get('/generos', 'get');           // Listar todos
    Route::get('/generos/{id}', 'details');  // Buscar por ID
    Route::post('/generos', 'store');        // Criar
    Route::put('/generos/{id}', 'update');   // Atualizar
    Route::delete('/generos/{id}', 'delete'); // Deletar

    Route::get('/generos/{id}/livros', 'livros'); // Listar livros de um gênero
    Route::get('/generos-com-livros', 'getWithLivros'); // Listar gêneros com seus livros
});

// Rotas agrupadas para Livro
Route::controller(LivroController::class)->group(function () {
    Route::get('/livros', 'get');           // Listar todos
    Route::get('/livros/{id}', 'details');  // Buscar por ID
    Route::post('/livros', 'store');        // Criar
    Route::put('/livros/{id}', 'update');   // Atualizar
    Route::delete('/livros/{id}', 'delete'); // Deletar

    Route::get('/livros/{id}/reviews', 'reviews'); // Listar reviews de um livro
    Route::get('/livros-with-relations', 'getWithRelations'); // Listar livros com relações
});

// Rotas agrupadas para Review
Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');           // Listar todos
    Route::get('/reviews/{id}', 'details');  // Buscar por ID
    Route::post('/reviews', 'store');        // Criar
    Route::put('/reviews/{id}', 'update');   // Atualizar
    Route::delete('/reviews/{id}', 'delete'); // Deletar
});