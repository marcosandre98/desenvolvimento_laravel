<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use View;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.cliente');
    }

    public function showTable()
    {
        return Datatables::of(Cliente::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.criaCliente');
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

        $regla = [
            'id'=>'required',
            'nome'=>'required',
            'dt_nascimento'=>'required',
            'genero'=>'required',
            'ddd'=>'required',
            'fone'=>'required',
            'cep'=>'required',
            'uf_estado'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }

        Cliente::create([
                'id' => $request->id,
                'nome' => $request->nome,
                'dt_nascimento' => $request->dt_nascimento,
                'genero' => $request->genero,
                'ddd' => $request->ddd,
                'fone' => $request->fone,
                'cep' => $request->cep,
                'uf_estado' => $request->uf_estado,
                'created_at' => date('Y-m-d h:i:s')
            ]);
        
        //return ['status'=>true,'out'=>'reload'];
        //return ['status'=>true,'out'=>'redirect','route'=>route('home')];
        return ['status'=>true,'out'=>'alert','title'=>'Atenção','html'=>'Cliente cadastrado com <b>Sucesso</b>'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = Cliente::findOrFail($id);
        
        return view('cliente.editaCliente', ["u" => $u]); 
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
        $u = Cliente::findOrFail($id);

        $regla = [
            'nome'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }        

        $u->nome = $request->nome;
        $u->save();

        return ['status'=>true,
                'out'=>'redirect',
                "route" => route('cliente.index')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $cpf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = Cliente::findOrFail($id);
        $u->delete();

        return ['status'=>true,
                'out'=>'redirect', 
                'route'=>route('cliente.index')];
    }

}
