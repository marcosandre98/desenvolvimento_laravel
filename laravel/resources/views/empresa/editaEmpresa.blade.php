@extends('layouts.master')

@section('contenido')
<form class="form-horizontal" role="form" data-route="{{ route('empresa.update',$u->id) }}" id="fEditaEmpresa" data-method="PUT">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="descricao" class="col-md-4 control-label">Razão Social</label>

        <div class="col-md-6">
            <input id="descricao" type="text" class="form-control" name="descricao" required autofocus value="{{$u->nome}}">
            <span class="msg-error hidden" id="err_descricao"></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" class="btn btn-primary btnAjax" data-form="fEditaEmpresa">
                Atualizar
            </button>
        </div>
    </div>
</form>
@endsection