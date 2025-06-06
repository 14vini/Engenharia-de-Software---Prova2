<?php

namespace App\Services;

use App\Repositories\AutorRepository;

class AutorService
{
    protected $autorRepository;

    public function __construct(AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function getAll()
    {
        return $this->autorRepository->all();
    }

    public function getById($id)
    {
        return $this->autorRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->autorRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->autorRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->autorRepository->delete($id);
    }

    public function getAllWithLivros()
    {
        return $this->autorRepository->allWithLivros();
    }
}