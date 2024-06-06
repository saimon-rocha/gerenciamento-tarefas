<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('prioridades', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->timestamps(); // Adiciona created_at e updated_at automaticamente
        });

        // Inserindo prioridades padrão
        DB::table('prioridades')->insert([
            ['nome' => 'Baixa', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Média', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Alta', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prioridades');
    }
};
