@extends('layouts.master')

@section('css')
<link href="{{asset('css/lib/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <a href="{{route('empresa.create')}}">
    <button type="button" class="btn btn-primary">Adicionar Empresa</button></a>

    <br><br>
	
    <table class="table table-striped dataTables-example" id="tablaAjax">
	    <thead>
	      <tr>
	        <th>CNPJ</th>
	        <th>RAZÃO SOCIAL</th>
            <th>DDD FONE</th>
            <th>FONE</th>
            <th>CEP</th>
            <th>UF</th>
            <th>ENDERECO</th>
            <th>BAIRRO</th>
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
                url: '{!! route('empresa.showTable') !!}',
                type: "POST",
                data: {"_token":"{{ csrf_token() }}"}
                },
        columns: [                    
                { data: 'id', name: 'id', className:'center' },
                { data: 'descricao', name: 'descricao' },
                { data: 'ddd', name: 'ddd' },
                { data: 'fone', name: 'fone' },
                { data: 'cep', name: 'cep' },
                { data: 'uf_estado', name: 'uf_estado' },
                { data: 'endereco', name: 'endereco' },
                { data: 'bairro', name: 'bairro' },
                { data: 'id', name: 'id', className:'center'}
            ],
        columnDefs: [
        {
            targets: 8,
            createdCell: function (td, cellData, rowData, row, col) {
                edit="{!!URL::to('empresa/"+cellData+"/edit')!!}";
                deleted="{!!URL::to('empresa/"+cellData+"')!!}";
                $(td).html(buttonsTable(false,edit,deleted,true));
            }
        }
        ]
    });
    
});
 </script>
@endsection