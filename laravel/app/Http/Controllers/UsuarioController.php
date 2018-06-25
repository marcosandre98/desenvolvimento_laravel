<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use View;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.usuario');
    }

    public function showTable()
    {
        return Datatables::of(User::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.creaUsuario');
        //return view('usuario.creaUsuario2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $regla = ['nombre'=>'required',
                 'correo_electrónico'=>'required|email|unique:users,email',
                 'contraseña'=>'required|same:confirma_contraseña'
                 ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }

        User::create([
                'name' => $request->nombre,
                'email' => $request->correo_electrónico,
                'password' => bcrypt($request->contraseña),
                'created_at' => date('Y-m-d h:i:s')
            ]);
        
        //return ['status'=>true,'out'=>'reload'];
        //return ['status'=>true,'out'=>'redirect','route'=>route('home')];
        return ['status'=>true,'out'=>'alert','title'=>'Atención','html'=>'Se guardó <b>éxitosamente</b>'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        $dat = ["u"=>$data];
        $html = View::make('usuario.verUsuario',$dat)->render();
        return ['title'=>'Detalle','html'=>$html]; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = User::findOrFail($id);
        
        return view('usuario.editaUsuario', ["u" => $u]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $u = User::findOrFail($id);

        $regla = ['nombre'=>'required',
                 'email'=>['required','email',
                            Rule::unique('users')->ignore($u->email,'email')]
                ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }        

        $u->name = $request->nombre;
        $u->email = $request->email;
        $u->save();

        return ['status'=>true,
                'out'=>'redirect',
                "route" => route('usuario.index')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = User::findOrFail($id);
        $u->delete();

        return ['status'=>true,
                'out'=>'redirect', 
                'route'=>route('usuario.index')];
    }

}
