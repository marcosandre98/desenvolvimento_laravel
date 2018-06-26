@extends('layouts.master')

@section('contenido')
<form class="form-horizontal" role="form" data-route="{{ route('servico.update',$u->id) }}" id="fEditaServico" data-method="PUT">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="descricao" class="col-md-4 control-label">Descrição: *</label>

        <div class="col-md-6">
            <input id="descricao" type="text" class="form-control" name="descricao" required autofocus value="{{$u->descricao}}">
            <span class="msg-error hidden" id="err_descricao"></span>
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
        <label for="tempo_servico" class="col-md-4 control-label">Tempo Serviço: *</label>

        <div class="col-md-6">
            <input id="tempo_servico" type="text" class="form-control" name="tempo_servico" required value="{{$u->tempo_servico}}">
            <span class="msg-error hidden" id="err_tempo_servico"></span>
        </div>
    </div>    

    <div class="form-group">
        <label for="id_empresa" class="col-md-4 control-label">Empresa: *</label>

        <div class="col-md-6">
            <input id="id_empresa" type="text" class="form-control" name="id_empresa" required value="{{$u->id_empresa}}">
            <span class="msg-error hidden" id="err_id_empresa"></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" class="btn btn-primary btnAjax" data-form="fEditaServico">
                Atualizar
            </button>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Campos Obrigatórios (*)</label>
    </div>
    
</form>
@endsection