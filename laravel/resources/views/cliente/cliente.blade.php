@extends('layouts.master')

@section('css')
<link href="{{asset('css/lib/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <a href="{{route('cliente.create')}}">
    <button type="button" class="btn btn-primary">Adicionar Cliente</button></a>

    <br><br>
	
    <table class="table table-striped dataTables-example" id="tablaAjax">
	    <thead>
	      <tr>
	        <th>CPF</th>
	        <th>NOME</th>
            <th>DATA NASC.</th>
            <th>GÊNERO</th>
            <th>DDD FONE</th>
            <th>FONE</th>
            <th>CEP</th>
            <th>UF</th>
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
                url: '{!! route('cliente.showTable') !!}',
                type: "POST",
                data: {"_token":"{{ csrf_token() }}"}
                },
        columns: [                    
                { data: 'id', name: 'id', className:'center' },
                { data: 'nome', name: 'nome' },
                { data: 'dt_nascimento', name: 'dt_nascimento' },
                { data: 'genero', name: 'genero' },
                { data: 'ddd', name: 'ddd' },
                { data: 'fone', name: 'fone' },
                { data: 'cep', name: 'cep' },
                { data: 'uf_estado', name: 'uf_estado' },
                { data: 'id', name: 'id', className:'center'}
            ],
        columnDefs: [
        {
            targets: 8,
            createdCell: function (td, cellData, rowData, row, col) {
                edit="{!!URL::to('cliente/"+cellData+"/edit')!!}";
                deleted="{!!URL::to('cliente/"+cellData+"')!!}";
                $(td).html(buttonsTable(false,edit,deleted,true));
            }
        }
        ]
    });
    
});
 </script>
@endsection