<?php

namespace App\Services;

use App\Repositories\LivroRepository;

class LivroService
{
    protected $livroRepository;

    public function __construct(LivroRepository $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function getAll()
    {
        return $this->livroRepository->all();
    }

    public function getById($id)
    {
        return $this->livroRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->livroRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->livroRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->livroRepository->delete($id);
    }

    public function getAllWithRelations()
    {
        return $this->livroRepository->allWithRelations();
    }
}