<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // referencia à tabela no banco de dados
    protected $fillable = ['nome', 'email', 'senha'];

    public function reviews()
    {
        return $this->hasMany(  //um usuario tem muitas reviews 
            Review::class, 
            'usuario_id',
            'id');
    }
}
