<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id(); // bigint unsigned
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data_de_publicacao');
            $table->date('data_de_termino');
            //
            $table->unsignedBigInteger('prioridade_id');
            $table->unsignedBigInteger('setor_id');
            $table->foreign('prioridade_id')->references('id')->on('prioridades')->onDelete('cascade');
            $table->foreign('setor_id')->references('id')->on('setores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
