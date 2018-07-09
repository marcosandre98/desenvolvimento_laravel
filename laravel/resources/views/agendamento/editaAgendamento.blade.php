@extends('layouts.master')

@section('contenido')
<form class="form-horizontal" role="form" data-route="{{ route('agendamento.update',$u->id) }}" id="fEditaAgendamento" data-method="PUT">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="id_empresa" class="col-md-4 control-label">Empresa: *</label>

        <div class="col-md-6">
            <input id="id_empresa" type="text" class="form-control" name="id_empresa" required autofocus value="{{$u->id_empresa}}">
            <span class="msg-error hidden" id="err_id_empresa"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="cep" class="col-md-4 control-label">CEP: *</label>

        <div class="col-md-6">
            <input id="cep" type="text" class="form-control" name="cep" required value="{{$u->cep}}">
            <span class="msg-error hidden" id="err_cep"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="dt_agendamento" class="col-md-4 control-label">Data: *</label>

        <div class="col-md-6">
            <input id="dt_agendamento" type="date" class="form-control" name="dt_agendamento" required value="{{$u->dt_agendamento}}">
            <span class="msg-error hidden" id="err_dt_agendamento"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="id_servico" class="col-md-4 control-label">Serviço: *</label>

        <div class="col-md-6">
            <input id="id_servico" type="text" class="form-control" name="id_servico" required value="{{$u->id_servico}}">
            <span class="msg-error hidden" id="err_id_servico"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="preco" class="col-md-4 control-label">Valor (R$): *</label>

        <div class="col-md-6">
            <input id="preco" type="text" class="form-control" name="preco" required value="{{$u->preco}}">
            <span class="msg-error hidden" id="err_preco"></span>
        </div>
    </div>    

    <div class="form-group">
        <label for="hr_inicial" class="col-md-4 control-label">Hora Inicial: *</label>

        <div class="col-md-6">
            <input id="hr_inicial" type="time" class="form-control" name="hr_inicial" required value="{{$u->hr_inicial}}">
            <span class="msg-error hidden" id="err_hr_inicial"></span>
        </div>
    </div>    

    <div class="form-group">
        <label for="hr_final" class="col-md-4 control-label">Hora Final: *</label>

        <div class="col-md-6">
            <input id="hr_final" type="time" class="form-control" name="hr_final" required value="{{$u->hr_final}}">
            <span class="msg-error hidden" id="err_hr_final"></span>
        </div>
    </div>


    <div class="form-group">
        <label for="id_cliente" class="col-md-4 control-label">Cliente: *</label>

        <div class="col-md-6">
            <input id="id_cliente" type="text" class="form-control" name="id_cliente" required value="{{$u->id_cliente}}">
            <span class="msg-error hidden" id="err_id_cliente"></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" class="btn btn-primary btnAjax" data-form="fEditaAgendamento">
                Atualizar
            </button>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Campos Obrigatórios (*)</label>
    </div>
    
</form>
@endsection