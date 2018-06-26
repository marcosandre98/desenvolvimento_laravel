@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Cliente</div>
                <div class="panel-body">

                    <form class="form-horizontal" id="fCriaCliente" data-route="{{route('cliente.store')}}" data-method="POST">
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="id" class="col-md-4 control-label">CPF:</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" autofocus>

                                <span class="msg-error hidden" id="err_id"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome:</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome">

                                <span class="msg-error hidden" id="err_nome"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dt_nascimento" class="col-md-4 control-label">Data Nascimento:</label>

                            <div class="col-md-6">
                                <input id="dt_nascimento" type="date" class="form-control" name="dt_nascimento">

                                <span class="msg-error hidden" id="err_dt_nascimento"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="genero" class="col-md-4 control-label">Gênero:</label>

                            <div class="col-md-6">
                                <input id="genero" type="text" class="form-control" name="genero" placeholder="M ou F">

                                <span class="msg-error hidden" id="err_genero"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Fone:</label>

                            <div class="col-md-6">
                                <input id="ddd" type="text" class="form" name="ddd" placeholder="DDD" size="2">
                                <input id="fone" type="text" class="form" name="fone" placeholder="Fone">

                                <span class="msg-error hidden" id="err_fone"></span>
                                
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="cep" class="col-md-4 control-label">CEP:</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" name="cep">

                                <span class="msg-error hidden" id="err_cep"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="uf_estado" class="col-md-4 control-label">UF:</label>

                            <div class="col-md-6">
                                <input id="uf_estado" type="text" class="form-control" name="uf_estado">

                                <span class="msg-error hidden" id="err_uf_estado"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="BtnCriaCliente" class="btn btn-primary btnAjax" data-form="fCriaCliente">
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