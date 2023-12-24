<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceria extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parDataCadastro',
        'parNome',
        'parEmail',
        'parTelefone',
        'parEndereco',
        'parDescricao',
        'parImagem',
        'parMensagem',
        'parDataInicio',
        'parDataFim',
        'parAprovado',
        'parFinalizado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
