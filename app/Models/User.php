<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'endereco',
        'telefone',
        'level',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cor(): HasMany
    {
        return $this->hasMany(Cor::class, 'user_id', 'id');
    }

    public function especie():HasMany
    {
        return $this->hasMany(Especie::class, 'user_id', 'id');
    }

    public function racas(): HasMany
    {
        return $this->hasMany(Raca::class, 'user_id', 'id');
    }

    public function tamanhos(): HasMany
    {
        return $this->hasMany(Tamanho::class, 'user_id', 'id');
    }

    public function situacoes(): HasMany
    {
        return $this->hasMany(Situacao::class, 'user_id', 'id');
    }

    public function mensagem(): HasMany
    {
        return $this->hasMany(Mensagem::class, 'user_id', 'id');
    }

    public function parceria(): HasMany
    {
        return $this->hasMany(Parceria::class, 'user_id', 'id');
    }

    public function adocao(): HasMany
    {
        return $this->hasMany(Adocao::class, 'user_id', 'id');
    }

    public function adocao_interesse(): HasMany
    {
        return $this->hasMany(AdocaoInteresse::class, 'user_id', 'id');
    }

    public function adocao_mensagem(): HasMany
    {
        return $this->hasMany(AdocaoMensagem::class, 'user_id', 'id');
    }
}
