<?php

namespace App\Services;

use App\Repositories\GeneroRepository;

class GeneroService
{
    protected $generoRepository;

    public function __construct(GeneroRepository $generoRepository)
    {
        $this->generoRepository = $generoRepository;
    }

    public function getAll()
    {
        return $this->generoRepository->all();
    }

    public function getById($id)
    {
        return $this->generoRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->generoRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->generoRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->generoRepository->delete($id);
    }

    public function getAllWithLivros()
    {
        return $this->generoRepository->allWithLivros();
    }
}