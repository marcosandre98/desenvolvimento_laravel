<?php
namespace App\Http\Requests;

use Validator;

class Requests
{

    static function valida($request,$regla)
    {
    	$valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }
    }
}
