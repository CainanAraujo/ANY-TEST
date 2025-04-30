<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Importa o trait

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'nome_completo',
        'data_nascimento',
        'telefone',
        'email',
        'password',
        'celular',
        'cpf',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'uf',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
