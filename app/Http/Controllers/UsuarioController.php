<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function get()
    {
        return response()->json($this->usuarioService->getAll());
    }

    public function details($id)
    {
        $usuario = $this->usuarioService->getById($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        $usuario = $this->usuarioService->create($request->all());
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = $this->usuarioService->update($id, $request->all());
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return response()->json($usuario);
    }

    public function delete($id)
    {
        $usuario = $this->usuarioService->delete($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return response()->json(['message' => 'Usuário deletado com sucesso']);
    }

    public function reviews($id)
    {
        $usuario = $this->usuarioService->getById($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return response()->json($usuario->reviews);
    }
}