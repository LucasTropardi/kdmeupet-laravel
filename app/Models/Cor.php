<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // int
        'cor', // string
    ];

    public function animais()
    {
        return $this->hasMany(Animal::class, 'cor_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
