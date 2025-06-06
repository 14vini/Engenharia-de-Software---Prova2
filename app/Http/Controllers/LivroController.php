<?php

namespace App\Http\Controllers;

use App\Services\LivroService;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    protected $livroService;

    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function get()
    {
        return response()->json($this->livroService->getAll());
    }

    public function details($id)
    {
        $livro = $this->livroService->getById($id);
        if (!$livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }
        return response()->json($livro);
    }

    public function store(Request $request)
    {
        $livro = $this->livroService->create($request->all());
        return response()->json($livro, 201);
    }

    public function update(Request $request, $id)
    {
        $livro = $this->livroService->update($id, $request->all());
        if (!$livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }
        return response()->json($livro);
    }

    public function delete($id)
    {
        $livro = $this->livroService->delete($id);
        if (!$livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }
        return response()->json(['message' => 'Livro deletado com sucesso']);
    }

    public function reviews($id)
    {
        $livro = $this->livroService->getById($id);
        if (!$livro) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }
        return response()->json($livro->reviews);
    }

    public function getWithRelations()
    {
        $livros = $this->livroService->getAllWithRelations();
        return response()->json($livros);
    }
}