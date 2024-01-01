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
        Schema::create('adocao_interesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adocao_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('adiDataCadastro');
            $table->string('adiContato');
            $table->string('adiMensagem');
            $table->integer('adiFinalizado')->default(0);
            $table->string('adiResposta');
            $table->string('adiDataResposta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adocao_interesses');
    }
};
