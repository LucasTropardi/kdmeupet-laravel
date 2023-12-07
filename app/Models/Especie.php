<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    protected $fillable = [
        'esNome', // string
    ];

    public function animais()
    {
        return $this->hasMany(Animal::class, 'especie_id', 'id');
    }

    public function raca()
    {
        return $this->hasMany(Raca::class, 'raca_id', 'id');
    }

    public function tamanho()
    {
        return $this->hasMany(Tamanho::class, 'tamanho_id', 'id');
    }
}
