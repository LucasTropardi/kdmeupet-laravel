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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('anNome');
            $table->string('anFoto');
            $table->string('anDescricao');
            $table->date('anData');
            $table->foreignId('especie_id')->constrained();
            $table->foreignId('raca_id')->constrained();
            $table->foreignId('tamanho_id')->constrained();
            $table->foreignId('cor_id')->constrained();
            $table->string('anEndereco');
            $table->foreignId('situacao_id')->constrained();
            $table->integer('anFinalizado');
            $table->string('anContato');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
