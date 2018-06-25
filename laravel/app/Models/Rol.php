<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $estado_id
 * @property string $nombre
 * @property string $created_at
 * @property string $updated_at
 * @property Estado $estado
 * @property RolItem[] $rolItems
 * @property UsersRol[] $usersRols
 */
class Rol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rol';

    /**
     * @var array
     */
    protected $fillable = ['estado_id', 'nombre', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolItems()
    {
        return $this->hasMany('App\Models\RolItem');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersRols()
    {
        return $this->hasMany('App\Models\UsersRol');
    }
}
