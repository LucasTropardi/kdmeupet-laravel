<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // int
        'situacao_id', // int
        'especie_id', // int
        'raca_id', // int
        'cor_id', // int
        'tamanho_id', // int
        'anNome', // string
        'anDescricao', // string
        'anFoto', // string
        'anContato', // string
        'anData', // string date
        'anEndereco', // string
        'latitude', // string
        'longitude', // string
        'anFinalizado', // int
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

    public function situacao()
    {
        return $this->belongsTo(Situacao::class, 'situacao_id', 'id');
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class, 'cor_id', 'id');
    }

    public function tamanho()
    {
        return $this->belongsTo(Tamanho::class, 'tamanho_id', 'id');
    }

    public function mensagem()
    {
        return $this->hasMany(Mensagem::class, 'animal_id', 'id');
    }
}
