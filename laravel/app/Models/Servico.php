<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class Servico {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao', 'preco', 'created_at', 'updated_at'
    ];

    //-------------------- AGREGAR -------------------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servico()
    {
        return $this->belongsTo('App\Models\Servico');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicosRols()
    {
        return $this->hasMany('App\Models\ServicoRol', 'servicos_id');
    }
}
