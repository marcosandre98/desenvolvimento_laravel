<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{
   use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'descricao', 'ddd', 'fone', 'cep', 'uf_estado', 'endereco', 'bairro', 'numero', 'complemento', 'id_usuario', 'created_at', 'updated_at'
    ];

}
