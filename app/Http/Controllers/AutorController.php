<?php

namespace App\Http\Controllers;

use App\Services\AutorService;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    protected $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function get()
    {
        return response()->json($this->autorService->getAll());
    }

    public function details($id)
    {
        $autor = $this->autorService->getById($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json($autor);
    }

    public function store(Request $request)
    {
        $autor = $this->autorService->create($request->all());
        return response()->json($autor, 201);
    }

    public function update(Request $request, $id)
    {
        $autor = $this->autorService->update($id, $request->all());
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json($autor);
    }

    public function delete($id)
    {
        $autor = $this->autorService->delete($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json(['message' => 'Autor deletado com sucesso']);
    }

    public function livros($id)
    {
        $autor = $this->autorService->getById($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor não encontrado'], 404);
        }
        return response()->json($autor->livros);
    }

    public function getWithLivros()
    {
        return response()->json($this->autorService->getAllWithLivros());
    }
}