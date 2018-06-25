<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $estado_id
 * @property integer $item_id
 * @property string $nombre
 * @property string $ruta
 * @property string $icono
 * @property string $created_at
 * @property string $updated_at
 * @property Estado $estado
 * @property Item $item
 * @property RolItem[] $rolItems
 */
class Item extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'item';

    /**
     * @var array
     */
    protected $fillable = ['estado_id', 'item_id', 'nombre', 'ruta', 'icono', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolItems()
    {
        return $this->hasMany('App\Models\RolItem');
    }
}
