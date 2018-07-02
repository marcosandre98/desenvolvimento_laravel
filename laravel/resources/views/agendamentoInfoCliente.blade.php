@extends('layouts.agendamento')
    <!doctype html>
    <html lang="{{ config('app.locale') }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Agendamento</title>

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

            <!-- Styles -->
            <style>
                html, body {
                    background-color: #fff;
                    color: #636b6f;
                    font-family: 'Raleway', sans-serif;
                    font-weight: 100;
                    height: 100vh;
                    margin: 0;
                }

                .full-height {
                    height: 100vh;
                }

                .flex-center {
                    align-items: center;
                    display: flex;
                    justify-content: center;
                }

                .position-ref {
                    position: relative;
                }

                .top-right {
                    position: absolute;
                    right: 10px;
                    top: 18px;
                }

                .content {
                    text-align: center;
                }

                .title {
                    font-size: 14px;
                    font-weight: bold;
                }

                .links > a {
                    color: #636b6f;
                    padding: 0 25px;
                    font-size: 12px;
                    font-weight: 600;
                    letter-spacing: .1rem;
                    text-decoration: none;
                    text-transform: uppercase;
                }

                .m-b-md {
                    margin-bottom: 30px;
                }
            </style>
        </head>
        <body>
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">Início</a>
                        @else
                            <a href="{{ url('/login') }}">Acessar</a>
                            <a href="{{ url('/register') }}">Registrar-se</a>
                        @endif
                    </div>
                @endif

                 <div class="container">
    <div class="row"> 
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Preencha as informações abaixo para realizar um agendamento</div>
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
                            <label for="dt_nascimento" class="col-md-4 control-label">Data de Nascimento:</label>

                            <div class="col-md-6">
                                <input id="dt_nascimento" type="date" class="form-control" name="dt_nascimento">

                                <span class="msg-error hidden" id="err_dt_nascimento"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="genero" class="col-md-4 control-label">Gênero:</label>

                            <div class="col-md-6">
                                <input id="genero" type="radio" name="genero" value="M">Masculino
                                &nbsp&nbsp&nbsp&nbsp
                                <input id="genero" type="radio" name="genero" value="F">Feminino
                                &nbsp&nbsp&nbsp&nbsp
                                <input id="genero" type="radio" name="genero" value="O">Outro

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

                        <div class="panel-heading">Campos Obrigatórios (*)</div>
            
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="BtnCriaCliente" class="btn btn-primary btnAjax" data-form="fCriaCliente">
                                    Avançar
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   

            </div>
        </body>

    </html>