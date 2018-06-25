<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\RolItem;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = '[{"nombre":"Usuarios","ruta":"","icono":"glyphicon-user","item_id":null}, 
                  {"nombre":"Listar Usuarios","ruta":"usuario","icono":"","item_id":1},
                  {"nombre":"Crear Usuario","ruta":"usuario/create","icono":"","item_id":1}]';
        
        foreach (json_decode($item) as $key => $row) {
            Item::create([
                    'nombre'=>$row->nombre,
                    'ruta'=>$row->ruta,
                    'icono'=>$row->icono,
                    'item_id'=>$row->item_id,
                    'estado_id'=>1
                ]);
        }

        $RolItem = '[{"item_id":1,"rol_id":1},
                     {"item_id":2,"rol_id":1},
                     {"item_id":3,"rol_id":1}]';
        
        foreach (json_decode($RolItem) as $key => $row) {
            RolItem::create([
                    'item_id'=>$row->item_id,
                    'rol_id'=>$row->rol_id
                ]);
        }
    }
}
