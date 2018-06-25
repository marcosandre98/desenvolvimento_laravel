<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $item_id
 * @property integer $rol_id
 * @property string $created_at
 * @property string $updated_at
 * @property Item $item
 * @property Rol $rol
 */
class RolItem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rol_item';

    /**
     * @var array
     */
    protected $fillable = ['item_id', 'rol_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo('App\Models\Rol');
    }
}
