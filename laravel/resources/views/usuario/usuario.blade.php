@extends('layouts.master')

@section('css')
<link href="{{asset('css/lib/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <a href="{{route('usuario.create')}}">
    <button type="button" class="btn btn-primary">Criar Usuario</button></a>

    <br><br>
	
    <table class="table table-striped dataTables-example" id="tablaAjax">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>NOME</th>
	        <th>EMAIL</th>
            <th>ACAO</th>
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
                url: '{!! route('usuario.showTable') !!}',
                type: "POST",
                data: {"_token":"{{ csrf_token() }}"}
                },
        columns: [                    
                { data: 'id', name: 'id', className:'center' },
                { data: 'name', name: 'name' },                
                { data: 'email', name: 'email', className:'hidden-480' },
                { data: 'id', name: 'id', className:'center'}
            ],
        columnDefs: [
        {
            targets: 3,
            createdCell: function (td, cellData, rowData, row, col) {
                show="{!!URL::to('usuario/"+cellData+"')!!}";
                edit="{!!URL::to('usuario/"+cellData+"/edit')!!}";
                deleted="{!!URL::to('usuario/"+cellData+"')!!}";
                $(td).html(buttonsTable(show,edit,deleted,true));
            }
        }
        ]
    });
    
});
 </script>
@endsection