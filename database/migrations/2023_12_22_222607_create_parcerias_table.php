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
        Schema::create('parcerias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('parDataCadastro');
            $table->string('parNome');
            $table->string('parEmail');
            $table->string('parTelefone');
            $table->string('parEndereco');
            $table->string('parDescricao');
            $table->string('parImagem');
            $table->string('parMensagem');
            $table->string('parDataInicio');
            $table->string('parDataFim');
            $table->string('parAprovado')->default(0);
            $table->string('parFinalizado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcerias');
    }
};
