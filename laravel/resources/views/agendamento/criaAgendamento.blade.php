@extends('layouts.master')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Agendamento</div>
                <div class="panel-body">

                    <form class="form-horizontal" id="fCriaAgendamento" data-route="{{route('agendamento.store')}}" data-method="POST">
                        
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="id_empresa" class="col-md-4 control-label">Empresa: *</label>

                            <div class="col-md-6">
                                <input id="id_empresa" type="text" class="form-control" name="id_empresa" required autofocus>
                                <span class="msg-error hidden" id="err_id_empresa"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cep" class="col-md-4 control-label">CEP: *</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" name="cep" required>
                                <span class="msg-error hidden" id="err_cep"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dt_agendamento" class="col-md-4 control-label">Data: *</label>

                            <div class="col-md-6">
                                <input id="dt_agendamento" type="date" class="form-control" name="dt_agendamento">
                                <span class="msg-error hidden" id="err_dt_agendamento"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_servico" class="col-md-4 control-label">Serviço: *</label>

                            <div class="col-md-6">
                                <input id="id_servico" type="text" class="form-control" name="id_servico" required">
                                <span class="msg-error hidden" id="err_id_servico"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="preco" class="col-md-4 control-label">Valor (R$): *</label>

                            <div class="col-md-6">
                                <input id="preco" type="text" class="form-control" name="preco" required>
                                <span class="msg-error hidden" id="err_preco"></span>
                            </div>
                        </div>    

                        <div class="form-group">
                            <label for="hr_inicial" class="col-md-4 control-label">Hora Inicial: *</label>

                            <div class="col-md-6">
                                <input id="hr_inicial" type="text" class="form-control" name="hr_inicial" required>
                                <span class="msg-error hidden" id="err_hr_inicial"></span>
                            </div>
                        </div>    

                        <div class="form-group">
                            <label for="hr_final" class="col-md-4 control-label">Hora Final: *</label>

                            <div class="col-md-6">
                                <input id="hr_final" type="text" class="form-control" name="hr_final" required>
                                <span class="msg-error hidden" id="err_hr_final"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="id_cliente" class="col-md-4 control-label">Cliente: *</label>

                            <div class="col-md-6">
                                <input id="id_cliente" type="text" class="form-control" name="id_cliente" required>
                                <span class="msg-error hidden" id="err_id_cliente"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" id="BtnCriaAgendamento" class="btn btn-primary btnAjax" data-form="fCriaAgendamento">
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