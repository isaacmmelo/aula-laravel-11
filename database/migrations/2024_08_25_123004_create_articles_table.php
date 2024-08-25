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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            #Aqui podemos adicionar os campos da tabela, como por exemplo o assunto, texto, etc.
            $table->string('título',100)->index()->unique();
            #Utilizamos $table->tipo do campo, logo apos o nome, tamanho e após isso as especificações do campo.
            $table->text('texto',1000)->nullable();
            $table->unsignedBigInteger('autor')->index()->nullable();
            #Podemos também definir o relacionamento com a tabela de usuários
            $table->foreign('autor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
