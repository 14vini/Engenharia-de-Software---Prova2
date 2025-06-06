<?php

namespace App\Http\Controllers;

use App\Services\GeneroService;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    protected $generoService;

    public function __construct(GeneroService $generoService)
    {
        $this->generoService = $generoService;
    }

    public function get()
    {
        return response()->json($this->generoService->getAll());
    }

    public function getWithLivros()
    {
        return response()->json($this->generoService->getAllWithLivros());
    }

    public function details($id)
    {
        $genero = $this->generoService->getById($id);
        if (!$genero) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        return response()->json($genero);
    }

    public function store(Request $request)
    {
        $genero = $this->generoService->create($request->all());
        return response()->json($genero, 201);
    }

    public function update(Request $request, $id)
    {
        $genero = $this->generoService->update($id, $request->all());
        if (!$genero) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        return response()->json($genero);
    }

    public function delete($id)
    {
        $genero = $this->generoService->delete($id);
        if (!$genero) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        return response()->json(['message' => 'Gênero deletado com sucesso']);
    }

    public function livros($id)
    {
        $genero = $this->generoService->getById($id);
        if (!$genero) {
            return response()->json(['message' => 'Gênero não encontrado'], 404);
        }
        return response()->json($genero->livros);
    }
}