<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // título do livro
            $table->text('sinopse')->nullable(); // sinopse do livro, pode ser nula

            $table->unsignedBigInteger('genero_id'); // chave estrangeira para o gênero do livro
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade'); // referência à tabela generos
            
            $table->unsignedBigInteger('autor_id'); // chave estrangeira para o autor do livro
            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade'); // referência à tabela autores
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
