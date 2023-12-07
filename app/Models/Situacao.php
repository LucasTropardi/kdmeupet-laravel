<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'situacao', // string
    ];

    public function animais()
    {
        return $this->hasMany(Animal::class, 'situacao_id', 'id');
    }
}
