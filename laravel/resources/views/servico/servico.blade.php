@extends('layouts.master')

@section('css')
<link href="{{asset('css/lib/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <a href="{{route('servico.create')}}">
    <button type="button" class="btn btn-primary">Criar Serviço</button></a>

    <br><br>
	
    <table class="table table-striped dataTables-example" id="tablaAjax">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>DESCRIÇÃO</th>
	        <th>PREÇO</th>
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
                url: '{!! route('servico.showTable') !!}',
                type: "POST",
                data: {"_token":"{{ csrf_token() }}"}
                },
        columns: [                    
                { data: 'id', name: 'id', className:'center'},
                { data: 'descricao', name: 'descricao'},                
                { data: 'preco', name: 'preco', className:'center'}
            ],
            columnDefs: [
            {
                targets: 3,
                createdCell: function (td, cellData, rowData, row, col) {
                    show="{!!URL::to('servico/"+cellData+"')!!}";
                    edit="{!!URL::to('servico/"+cellData+"/edit')!!}";
                    deleted="{!!URL::to('servico/"+cellData+"')!!}";
                    $(td).html(buttonsTable(show,edit,deleted,true));
                }
            }
        ]
    });
    
});
 </script>
@endsection