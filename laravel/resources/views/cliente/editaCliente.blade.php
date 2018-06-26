@extends('layouts.master')

@section('contenido')
<form class="form-horizontal" role="form" data-route="{{ route('cliente.update',$u->id) }}" id="fEditaCliente" data-method="PUT">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="nome" class="col-md-4 control-label">Nome</label>

        <div class="col-md-6">
            <input id="nome" type="text" class="form-control" name="nome" required autofocus value="{{$u->nome}}">
            <span class="msg-error hidden" id="err_nombre"></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" class="btn btn-primary btnAjax" data-form="fEditaCliente">
                Atualizar
            </button>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">Campos Obrigatórios (*)</label>
    </div>
    
</form>
@endsection