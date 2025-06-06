<?php

namespace App\Repositories;

use App\Models\Genero;

class GeneroRepository
{
    public function all()
    {
        return Genero::all();
    }

    public function allWithLivros()
    {
        return \App\Models\Genero::with('livros')->get();
    }

    public function find($id)
    {
        return Genero::find($id);
    }

    public function create(array $data)
    {
        return Genero::create($data);
    }

    public function update($id, array $data)
    {
        $genero = Genero::find($id);
        if ($genero) {
            $genero->update($data);
        }
        return $genero;
    }

    public function delete($id)
    {
        $genero = Genero::find($id);
        if ($genero) {
            $genero->delete();
        }
        return $genero;
    }
}