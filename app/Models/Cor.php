<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;

    protected $fillable = [
        'cor', // string
    ];

    public function animais()
    {
        return $this->hasMany(Animal::class, 'cor_id', 'id');
    }
}
