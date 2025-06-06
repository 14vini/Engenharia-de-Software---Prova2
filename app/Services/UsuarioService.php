<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;

class UsuarioService
{
    protected $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getAll()
    {
        return $this->usuarioRepository->all();
    }

    public function getById($id)
    {
        return $this->usuarioRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->usuarioRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->usuarioRepository->delete($id);
    }
}