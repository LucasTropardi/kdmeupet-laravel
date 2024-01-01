<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdocaoInteresse extends Model
{
    use HasFactory;

    protected $fillable = [
        'adocao_id',
        'user_id',
        'adiDataCadastro',
        'adiContato',
        'adiMensagem',
        'adiFinalizado',
        'adiResposta',
        'adiDataResposta',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function adocao()
    {
        return $this->belongsTo(Adocao::class, 'adocao_id', 'id');
    }
}
