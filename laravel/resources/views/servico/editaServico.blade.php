@extends('layouts.master')

@section('contenido')
<form class="form-horizontal" role="form" data-route="{{ route('servico.update',$u->id) }}" id="fEditaServico" data-method="PUT">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="descricao" class="col-md-4 control-label">Descrição</label>

        <div class="col-md-6">
            <input id="descricao" type="text" class="form-control" name="descricao" required autofocus value="{{$u->descricao}}">
            <span class="msg-error hidden" id="err_descricao"></span>
        </div>
    </div>
<!--
    <div class="form-group">
        <label for="correo" class="col-md-4 control-label">Correo Electrónico</label>

        <div class="col-md-6">
            <input id="correo" type="email" class="form-control" name="email" required value="{{$u->email}}">
            <span class="msg-error hidden" id="err_email"></span>
        </div>
    </div>
-->
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" class="btn btn-primary btnAjax" data-form="fEditaServico">
                Atualizar
            </button>
        </div>
    </div>
</form>
@endsection