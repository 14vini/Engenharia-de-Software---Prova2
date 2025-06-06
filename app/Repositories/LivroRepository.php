<?php

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{
    public function all()
    {
        return Livro::all();
    }

    public function allWithRelations()
    {
        return Livro::with(['reviews', 'autor', 'genero'])->get();
    }

    public function find($id)
    {
        return Livro::find($id);
    }

    public function create(array $data)
    {
        return Livro::create($data);
    }

    public function update($id, array $data)
    {
        $livro = Livro::find($id);
        if ($livro) {
            $livro->update($data);
        }
        return $livro;
    }

    public function delete($id)
    {
        $livro = Livro::find($id);
        if ($livro) {
            $livro->delete();
        }
        return $livro;
    }
}