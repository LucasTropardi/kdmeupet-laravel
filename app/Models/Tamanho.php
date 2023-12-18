<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tamanho extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // int
        'especie_id', // int
        'tamanho', // string
    ];

    public function especie(): BelongsTo
    {
        return $this->belongsTo(Especie::class, 'especie_id', 'id');
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'tamanho_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
