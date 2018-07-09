@extends('layouts.master')

@section('css')
<link href="{{asset('css/lib/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <a href="{{route('agendamento.create')}}">
    <button type="button" class="btn btn-primary">Adicionar Agendamento</button></a>

    <br><br>
	
    <table class="table table-striped dataTables-example" id="tablaAjax">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>EMPRESA</th>
            <th>CEP</th>
            <th>DATA</th>
            <th>SERVIÇO</th>
            <th>VALOR (R$)</th>
            <th>HORA INICIAL</th>
            <th>HORA FINAL</th>
            <th>CLIENTE</th>
            <th>AÇÃO</th>
	      </tr>
	    </thead>
	</table>
@endsection

@section('js')
<script src="{{asset('js/lib/dataTables/datatables.min.js')}}"></script>
<script>
$(function() {
    
    $('#tablaAjax').DataTable({
        processing: true,
        serverSide: true,
        bAutoWidth: false,
        aaSorting: [],
        language:{"url": window.Laravel.url+"/js/lib/dataTables/data-table-portuguese.json"},
        ajax: {
                url: '{!! route('agendamento.showTable') !!}',
                type: "POST",
                data: {"_token":"{{ csrf_token() }}"}
                },
        columns: [                    
                { data: 'id', name: 'id', className:'center' },
                { data: 'id_empresa', name: 'id_empresa' },
                { data: 'cep', name: 'cep' },
                { data: 'dt_agendamento', name: 'dt_agendamento' },
                { data: 'id_servico', name: 'id_servico' },
                { data: 'preco', name: 'preco' },
                { data: 'hr_inicial', name: 'hr_inicial' },
                { data: 'hr_final', name: 'hr_final' },
                { data: 'id_cliente', name: 'id_cliente' },
                { data: 'id', name: 'id', className:'center'}
            ],
        columnDefs: [
        {
            targets: 9,
            createdCell: function (td, cellData, rowData, row, col) {
                edit="{!!URL::to('agendamento/"+cellData+"/edit')!!}";
                deleted="{!!URL::to('agendamento/"+cellData+"')!!}";
                $(td).html(buttonsTable(false,edit,deleted,true));
            }
        }
        ]
    });
    
});
 </script>
@endsection