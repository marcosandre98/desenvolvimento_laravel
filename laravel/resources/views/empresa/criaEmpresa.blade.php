@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Empresa</div>
                <div class="panel-body">

                    <form class="form-horizontal" id="fCriaEmpresa" data-route="{{route('empresa.store')}}" data-method="POST">
                        
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="id" class="col-md-4 control-label">CNPJ:</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" autofocus>

                                <span class="msg-error hidden" id="err_id"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="col-md-4 control-label">Razão Social:</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control" name="descricao">

                                <span class="msg-error hidden" id="err_descricao"></span>
                                
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
                            <label for="endereco" class="col-md-4 control-label">Endereço:</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control" name="endereco">

                                <span class="msg-error hidden" id="err_endereco"></span>
                                
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="bairro" class="col-md-4 control-label">Bairro:</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro">

                                <span class="msg-error hidden" id="err_bairro"></span>
                                
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="numero" class="col-md-4 control-label">Número:</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero">

                                <span class="msg-error hidden" id="err_numero"></span>
                                
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="complemento" class="col-md-4 control-label">Complemento:</label>

                            <div class="col-md-6">
                                <input id="complemento" type="text" class="form-control" name="complemento">

                                <span class="msg-error hidden" id="err_complemento"></span>
                                
                            </div>
                        </div>                                                                                            

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="BtnCriaEmpresa" class="btn btn-primary btnAjax" data-form="fCriaEmpresa">
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