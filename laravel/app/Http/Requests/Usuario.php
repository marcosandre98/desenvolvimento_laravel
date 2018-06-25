<?php
namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class Usuario
{
    static function login($request)
    {
        $regla = [
            'correo_electrónico'=>'required|email',
            'contraseña'=>'required|string'
        ];
        return Requests::valida($request,$regla); 
    }
}
