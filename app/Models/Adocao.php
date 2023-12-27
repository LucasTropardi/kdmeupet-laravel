<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'especie_id',
        'raca_id',
        'cor_id',
        'tamanho_id',
        'adDataCadastro',
        'adNome',
        'adIdade',
        'adDescricao',
        'adContato',
        'adEndereco',
        'adImagem',
        'adFinalizado',
        'adComentario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class, 'especie_id', 'id');
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class, 'raca_id', 'id');
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class, 'cor_id', 'id');
    }

    public function tamanho()
    {
        return $this->belongsTo(Tamanho::class, 'tamanho_id', 'id');
    }

    public function adocao_interesse()
    {
        return $this->hasMany(AdocaoInteresse::class, 'adocao_id', 'id');
    }

    public function adocao_mensagem()
    {
        return $this->hasMany(AdocaoMensagem::class, 'adocao_id', 'id');
    }
}
