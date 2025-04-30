<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'nome_fantasia',
        'cnpj',
        'tempo_empresa',
        'telefone',
        'status',
        'nome_local',
        'celular',
        'horario_funcionamento',
        'email',
        'cep',
        'bairro',
        'rua',
        'cidade',
        'uf',
        'categoria',
        'demais_categorias',
        'instagram',
        'site',
        'foto_perfil'
    ];
}
