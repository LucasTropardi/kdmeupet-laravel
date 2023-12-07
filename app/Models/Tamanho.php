<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tamanho extends Model
{
    use HasFactory;

    protected $fillable = [
        'especie_id',
        'tamanho',
    ];

    public function especie(): BelongsTo
    {
        return $this->belongsTo(Especie::class, 'especie_id', 'id');
    }

    public function animais()
    {
        return $this->hasMany(Animal::class, 'tamanho_id', 'id');
    }
}
