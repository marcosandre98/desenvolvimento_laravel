<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('estado')->insert([
            ['nombre' => 'Activo'],
            ['nombre' => 'Inactivo'],
        ]);

        /*$Estados = '[{"nombre":"Activo"},{"nombre":"Inactivo"}]';
        
        foreach (json_decode($Estados) as $key => $row) {
            Estado::create(['nombre'=>$row->nombre]);
        }*/
    }
}
