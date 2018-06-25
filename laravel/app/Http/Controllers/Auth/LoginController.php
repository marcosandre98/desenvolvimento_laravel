<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;//Agregar
use App\Http\Requests\Usuario;//Agregar
use Illuminate\Support\Facades\Auth;//Agregar
use View;//Agregar
use App\Models\User;//Agregar
use App\Models\Rol;//Agregar

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //VERIFICA LAS CREDENCIALES Y RETORNA LOS ROLES
    public function prelogin(Request $request){
        
        //Valida los campos
        $valida = Usuario::login($request);
        if($valida!=''){return $valida;}

        //Verifica las credenciales
        if (Auth::validate(['email' => $request->correo_electrónico,
                           'password' => $request->contraseña,
                           'estado_id' => 1])){
            
            $data = User::where('email',$request->correo_electrónico)->first();
            
            $roles = [];
            foreach ($data->usersRols as $row) {
                $roles[]=['id'=> $row->rol_id,
                          'rol'=>Rol::find($row->rol_id)->nombre];
            }

            $dat = ["u"=>$data,"roles"=>$roles,"password"=>$request->contraseña];

            $html = View::make('auth.rolesLogin',$dat)->render();
            
            return ['status'=>true,'out'=>'dialog',
                   'title'=>'Seleccione un rol',
                   'html'=>$html];
        }else{
            return ['status'=>true,'out'=>'alert',
                   'title'=>'Error al Ingresar',
                   'html'=>'Los datos ingresados no son correctos.<br>
                    Verifique e intente nuevamente.'];
        }
    }

    //GUARDA LA SESIÓN DEL USUARIO
    public function loginAjax(Request $request){

        if (Auth::attempt(['email' => $request->correo_electrónico,
                           'password' => $request->contraseña,
                           'estado_id' => 1])){
            session(['id_rol' => $request->rol]);

            return ['status'=>true,'out'=>'redirect','route'=>route('home')];
        }else{
            return ['status'=>true,'out'=>'alert',
                   'title'=>'Error al Ingresar',
                   'html'=>'Hubo un error al ingresar, verifique e intente nuevamente.'];   
        }
    }
}
