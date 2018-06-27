<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use View;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empresa.empresa');
    }

    public function showTable()
    {
        return Datatables::of(Empresa::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.criaEmpresa');
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
            'descricao'=>'required',
            'ddd'=>'required',
            'fone'=>'required',
            'cep'=>'required',
            'uf_estado'=>'required',
            'endereco'=>'required',
            'bairro'=>'required',
            'numero'=>'required',
            'complemento'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }

        Empresa::create([
                'id' => $request->id,
                'descricao' => $request->descricao,
                'ddd' => $request->ddd,
                'fone' => $request->fone,
                'cep' => $request->cep,
                'uf_estado' => $request->uf_estado,
                'endereco' => $request->endereco,
                'bairro' => $request->bairro,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'id_usuario' => '1',
                'created_at' => date('Y-m-d h:i:s')
            ]);
        
        //return ['status'=>true,'out'=>'reload'];
        //return ['status'=>true,'out'=>'redirect','route'=>route('home')];
        return ['status'=>true,'out'=>'alert','title'=>'Atenção','html'=>'Empresa cadastrada com <b>Sucesso</b>'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = Empresa::findOrFail($id);
        
        return view('empresa.editaEmpresa', ["u" => $u]); 
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
        $u = Empresa::findOrFail($id);

        $regla = [
            'descricao'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }        

        $u->descricao = $request->descricao;
        $u->save();

        return ['status'=>true,
                'out'=>'redirect',
                "route" => route('empresa.index')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $cpf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = Empresa::findOrFail($id);
        $u->delete();

        return ['status'=>true,
                'out'=>'redirect', 
                'route'=>route('empresa.index')];
    }

}
