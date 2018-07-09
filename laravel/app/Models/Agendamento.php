<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agendamento extends Authenticatable
{
   use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_empresa', 'cep', 'dt_agendamento', 'id_servico', 'preco', 'hr_inicial', 'hr_final', 'id_cliente'
    ];

}
