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
        Schema::create('adocaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('especie_id')->constrained();
            $table->foreignId('raca_id')->constrained();
            $table->foreignId('cor_id')->constrained();
            $table->foreignId('tamanho_id')->constrained();
            $table->string('adDataCadastro');
            $table->string('adNome');
            $table->string('adIdade');
            $table->string('adDescricao');
            $table->string('adContato');
            $table->string('adEndereco');
            $table->string('adImagem');
            $table->integer('adFinalizado')->default(0);
            $table->string('adComentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adocaos');
    }
};
