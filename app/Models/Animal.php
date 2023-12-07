<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // int
        'anNome', // string
        'anFoto', // string
        'anDescricao', // string
        'anData', // string date
        'especie_id', // int
        'raca_id', // int
        'tamanho_id', // int
        'cor_id', // int
        'anEndereco', // string
        'situacao_id', // int
        'anFinalizado', // int
        'anContato', // string
        'latitude', // string
        'longitude', // string
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function especie()
    {
        $this->belongsTo(Especie::class, 'especie_id', 'id');
    }

    public function raca()
    {
        $this->belongsTo(Raca::class, 'raca_id', 'id');
    }

    public function situacao()
    {
        $this->belongsTo(Situacao::class, 'situacao_id', 'id');
    }

    public function cor()
    {
        $this->belongsTo(Cor::class, 'cor_id', 'id');
    }

    public function tamanho()
    {
        $this->belongsTo(Tamanho::class, 'cor_id', 'id');
    }
}
