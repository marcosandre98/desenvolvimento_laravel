@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Serviço</div>
                <div class="panel-body">

                    <form class="form-horizontal" id="fCriaServico" data-route="{{route('servico.store')}}" data-method="POST">
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Descrição: *</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control" name="descricao" autofocus>

                                <span class="msg-error hidden" id="err_descricao"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="preco" class="col-md-4 control-label">Valor (R$): *</label>

                            <div class="col-md-6">
                                <input id="preco" type="string" class="form-control" name="preco">

                                <span class="msg-error hidden" id="err_preco"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tempo_servico" class="col-md-4 control-label">Tempo Serviço: *</label>

                            <div class="col-md-6">
                                <input id="tempo_servico" type="time" class="form-control" name="tempo_servico">

                                <span class="msg-error hidden" id="err_tempo_servico"></span>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="id_empresa" class="col-md-4 control-label">Empresa: *</label>

                            <div class="col-md-6">
                                <input id="id_empresa" type="text" class="form-control" name="id_empresa">

                                <span class="msg-error hidden" id="err_id_empresa"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="BtnCriaServico" class="btn btn-primary btnAjax" data-form="fCriaServico">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="col-md-3 control-label">Campos Obrigatórios (*)</label>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection