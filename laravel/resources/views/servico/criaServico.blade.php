@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Criar Serviço</div>
                <div class="panel-body">

                    <form class="form-horizontal" id="fCriaServico" data-route="{{route('servico.store')}}" data-method="POST">
                        
                        {{ csrf_field() }}                        

                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control" name="descricao" autofocus>

                                <span class="msg-error hidden" id="err_descricao"></span>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="preco" class="col-md-4 control-label">Preço</label>

                            <div class="col-md-6">
                                <input id="preco" type="float" class="form-control" name="preco">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="BtnCriaServico" class="btn btn-primary btnAjax" data-form="fCriaServico">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection