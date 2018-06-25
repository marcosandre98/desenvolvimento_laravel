@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Usuario</div>
                <div class="panel-body">

                    <form class="form-horizontal" id="fCreaUsuario" data-route="{{route('usuario.store')}}" data-method="POST">
                        
                        {{ csrf_field() }}                        

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" autofocus>

                                <span class="msg-error hidden" id="err_nombre"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="correo" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control" name="correo_electrónico">

                                <span class="msg-error hidden" id="err_correo_electrónico"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contrasena" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="contrasena" type="password" class="form-control" name="contraseña">

                                <span class="msg-error hidden" id="err_contraseña"></span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirma_contrasena" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="confirma_contrasena" type="password" class="form-control" name="confirma_contraseña">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="BtnCreaUsuario" class="btn btn-primary btnAjax" data-form="fCreaUsuario">
                                    Registrar
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