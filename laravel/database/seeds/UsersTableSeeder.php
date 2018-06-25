<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rol;
use App\Models\UsersRol;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = '[{"nombre":"Super Administrador","estado_id":1}, 
                  {"nombre":"Administrador","estado_id":2},
                  {"nombre":"Cliente","estado_id":2}]';
        
        foreach (json_decode($rol) as $key => $row) {
            Rol::create([
                    'nombre'=>$row->nombre,
                    'estado_id'=>$row->estado_id
                ]);
        }

        $users = '[{"nombre":"Giovanny Gonzalez","correo":"giophonex@misena.edu.co","contrasena":123456},
                   {"nombre":"Pepito Perez","correo":"pepito@gmail.com","contrasena":123456}]';

        foreach (json_decode($users) as $key => $row) {
            User::create([
                'name' => $row->nombre,
                'email' => $row->correo,
                'password' => bcrypt($row->contrasena),
                'estado_id' => 1
            ]);
        }

        $UserRol = '[{"users_id":1,"rol_id":1},
                     {"users_id":2,"rol_id":2}]';
        
        foreach (json_decode($UserRol) as $key => $row) {
            UsersRol::create([
                    'users_id'=>$row->users_id,
                    'rol_id'=>$row->rol_id
                ]);
        }
    }
}
