<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use View;


class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servico.servico');
    }

    public function showTable()
    {
        return Datatables::of(Servico::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servico.criaServico');
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
            //'id'=>'required',
            'descricao'=>'required',
            'preco'=>'required',
            'tempo_servico'=>'required',
            'id_empresa'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }

        Servico::create([
                //'id' => $request->id,
                'descricao' => $request->descricao,
                'preco' => $request->preco,
                'tempo_servico' => $request->tempo_servico,
                'id_empresa' => $request->id_empresa,
                'created_at' => date('Y-m-d h:i:s')
            ]);
        
        //return ['status'=>true,'out'=>'reload'];
        //return ['status'=>true,'out'=>'redirect','route'=>route('home')];
        return ['status'=>true,'out'=>'alert','title'=>'Atenção','html'=>'Serviço cadastrado com <b>Sucesso</b>'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = Servico::findOrFail($id);
        
        return view('servico.editaServico', ["u" => $u]); 
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
        $u = Servico::findOrFail($id);

        $regla = [
            'descricao'=>'required',
            'preco'=>'required',
            'tempo_servico'=>'required',
            'id_empresa'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }        

        $u->descricao = $request->descricao;
        $u->preco = $request->preco;
        $u->tempo_servico = $request->tempo_servico;
        $u->id_empresa = $request->id_empresa;
        $u->save();

        return ['status'=>true,
                'out'=>'redirect',
                "route" => route('servico.index')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $cpf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = Servico::findOrFail($id);
        $u->delete();

        return ['status'=>true,
                'out'=>'redirect', 
                'route'=>route('servico.index')];
    }

}
