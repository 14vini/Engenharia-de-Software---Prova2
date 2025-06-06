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

// Usuario
Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'get');
    Route::get('/usuarios/{id}', 'details');
    Route::post('/usuarios', 'store');
    Route::put('/usuarios/{id}', 'update');
    Route::delete('/usuarios/{id}', 'delete');
    
    Route::get('/usuarios/{id}/reviews', 'reviews'); // Listar reviews de um usuário
});

//Autor
Route::controller(AutorController::class)->group(function () {
    Route::get('/autores', 'get');
    Route::get('/autores/{id}', 'details');
    Route::post('/autores', 'store');
    Route::put('/autores/{id}', 'update');
    Route::delete('/autores/{id}', 'delete');

    Route::get('/autores/{id}/livros', 'livros'); // Listar livros de um autor
    Route::get('/autores-com-livros', 'getWithLivros'); // Listar autores com seus livros
});

// Genero
Route::controller(GeneroController::class)->group(function () {
    Route::get('/generos', 'get');
    Route::get('/generos/{id}', 'details');
    Route::post('/generos', 'store');
    Route::put('/generos/{id}', 'update');
    Route::delete('/generos/{id}', 'delete');

    Route::get('/generos/{id}/livros', 'livros'); // Listar livros de um gênero
    Route::get('/generos-com-livros', 'getWithLivros'); // Listar gêneros com seus livros
});

// Livro
Route::controller(LivroController::class)->group(function () {
    Route::get('/livros', 'get');
    Route::get('/livros/{id}', 'details');
    Route::post('/livros', 'store');
    Route::put('/livros/{id}', 'update');
    Route::delete('/livros/{id}', 'delete');

    Route::get('/livros/{id}/reviews', 'reviews'); // Listar reviews de um livro
    Route::get('/livros-with-relations', 'getWithRelations'); // Listar livros com relações
});

//Review
Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');
    Route::get('/reviews/{id}', 'details');
    Route::post('/reviews', 'store');
    Route::put('/reviews/{id}', 'update');
    Route::delete('/reviews/{id}', 'delete');
});