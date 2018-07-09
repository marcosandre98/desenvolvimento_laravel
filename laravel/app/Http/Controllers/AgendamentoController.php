<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use View;


class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agendamento.agendamento');
    }

    public function showTable()
    {
        return Datatables::of(Agendamento::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agendamento.criaAgendamento');
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
            'id_empresa'=>'required',
            'cep'=>'required',
            'dt_agendamento'=>'required',
            'id_servico'=>'required',
            'preco'=>'required',
            'hr_inicial'=>'required',
            'hr_final'=>'required',
            'id_cliente'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }

        Agendamento::create([
                'id_empresa' => $request->id_empresa,
                'cep' => $request->cep,
                'dt_agendamento' => $request->dt_agendamento,
                'id_servico' => $request->id_servico,
                'preco' => $request->preco,
                'hr_inicial' => $request->hr_inicial,
                'hr_final' => $request->hr_final,
                'id_cliente' => $request->id_cliente,
                'created_at' => date('Y-m-d h:i:s')
            ]);
        
        //return ['status'=>true,'out'=>'reload'];
        //return ['status'=>true,'out'=>'redirect','route'=>route('home')];
        return ['status'=>true,'out'=>'alert','title'=>'Atenção','html'=>'Agendamento cadastrado com <b>Sucesso</b>'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = Agendamento::findOrFail($id);
        
        return view('agendamento.editaAgendamento', ["u" => $u]); 
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
        $u = Agendamento::findOrFail($id);

        $regla = [
            'id_empresa'=>'required',
            'cep'=>'required',
            'dt_agendamento'=>'required',
            'id_servico'=>'required',
            'preco'=>'required',
            'hr_inicial'=>'required',
            'hr_final'=>'required',
            'id_cliente'=>'required'
        ];

        $valida = Validator::make($request->all(),$regla);
        
        if ($valida->fails()) {
            return ['status' => false,
                    'errors' => $valida->messages()];
        }        

        $u->id_empresa = $request->id_empresa;
        $u->cep = $request->cep;
        $u->dt_agendamento = $request->dt_agendamento;
        $u->id_servico = $request->id_servico;
        $u->preco = $request->preco;
        $u->hr_inicial = $request->hr_inicial;
        $u->hr_final = $request->hr_final;
        $u->id_cliente = $request->id_cliente;
        $u->save();

        return ['status'=>true,
                'out'=>'redirect',
                "route" => route('agendamento.index')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $cpf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = Agendamento::findOrFail($id);
        $u->delete();

        return ['status'=>true,
                'out'=>'redirect', 
                'route'=>route('agendamento.index')];
    }

}
