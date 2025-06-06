<?php

namespace App\Repositories;

use App\Models\Autor;

class AutorRepository
{
    public function all()
    {
        return Autor::all();
    }

    public function find($id)
    {
        return Autor::find($id);
    }

    public function create(array $data)
    {
        return Autor::create($data);
    }

    public function update($id, array $data)
    {
        $autor = Autor::find($id);
        if ($autor) {
            $autor->update($data);
        }
        return $autor;
    }

    public function delete($id)
    {
        $autor = Autor::find($id);
        if ($autor) {
            $autor->delete();
        }
        return $autor;
    }
    
    public function allWithLivros()
    {
        return \App\Models\Autor::with('livros')->get();
    }
}